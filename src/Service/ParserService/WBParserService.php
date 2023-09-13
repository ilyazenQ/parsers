<?php

namespace App\Service\ParserService;

use App\DTO\Parser\ProductDTO;
use App\Service\ParserService\FetchWBService;
use App\Entity\Category;
use App\Repository\ProductRepository;
use App\Service\ParserService\Config\WBConfig;
use Doctrine\ORM\EntityManagerInterface;

class WBParserService implements ParserServiceInterface
{
    public function __construct(
        private readonly FetchWBService $fetchWBService,
        private readonly WBConfig $config,
        private readonly ProductRepository $productRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function process(Category $category): void
    {
        $page = 0;
        do {
            $page++;
            $apiUrl = $this->config::CATEGORY_CONFIG[$category->getSlug()]['url'] . "&page={$page}";
            $data = $this->fetchWBService->fetch($apiUrl);
            $this->parse($category, $data);
        } while (count($data) > 0);
    }

    private function isSkipSubject(array $item, Category $category): bool
    {
        return in_array($item['subjectId'], $this->config::CATEGORY_CONFIG[$category->getSlug()]['skip_subject']);
    }

    private function parse(Category $category, array $data): void
    {
        foreach ($data as $item) {
            if ($this->isSkipSubject($item, $category)) {
                continue;
            }
            $this->processProduct($item, $category);
        }
        $this->entityManager->flush();
    }

    private function processProduct(array $item, Category $category): void
    {
        $productDTO = $this->processProductDTO($item, $category);
        $this->productRepository->updateOrCreate($productDTO);
    }

    private function processProductDTO(array $item, Category $category): ProductDTO
    {
        $productDTO = new ProductDTO();
        $productDTO->setName($item['name']);
        $productDTO->setBrandName($item['brand']);
        $productDTO->setExternalId($item['id']);
        $productDTO->setFullPrice($item['priceU']);
        $productDTO->setSalePrice($item['salePriceU']);
        $productDTO->setCategory($category);
        $productDTO->setDiffPrice($productDTO->getFullPrice() - $productDTO->getSalePrice());
        $productDTO->setExtra($item);
        $productDTO->setShopVendor($this->config->getShopVendor());
        $productDTO->setLink($this->config->generateLink($item['id']));
        return $productDTO;
    }
}