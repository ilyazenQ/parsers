<?php

namespace App\Service\FilterService;

use App\DTO\Filter\Product\ProductFilterRequestDTO;
use App\DTO\Parser\DTOInterface;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class ProductFilterService
{

    private array $filter = [];
    private array $sort = [];

    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    ) {
    }

    public function process(Request $request): void
    {
        $productFilterRequestDTO = new ProductFilterRequestDTO($request->query->all());

        $this->applyFilters($productFilterRequestDTO);
        $this->applySort($productFilterRequestDTO);
    }

    public function getFilter(): array
    {
        return $this->filter;
    }

    public function getSort(): array
    {
        return $this->sort;
    }

    private function applyFilters(DTOInterface $DTO): array
    {
        $this->filter = $DTO->category ? [
            'Category' => $this->categoryRepository->find(
                $DTO->category
            )
        ] : [];
    }

    private function applySort(DTOInterface $DTO): array
    {
        $this->sort = [$DTO->sortField => $DTO->sortVal];
    }
}