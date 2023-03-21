<?php

namespace App\Service\ParserService;

use App\Service\ParserService\FetchWBService;
use App\Entity\Category;


class WBParserService implements ParserServiceInterface{
    public function __construct(
        private readonly FetchWBService $fetchWBService,
        private readonly config $config,
    ) {

    }
    public function process(Category $category):void {
        $page = 0;
        do {
            $page++;
            $apiUrl = $this->config::CATEGORY_URL[$category->getSlug()]."&page={$page}";
            $data = $this->fetchWBService->fetch($apiUrl);
            var_dump($page);
        } while (count($data) > 0);
    }
}