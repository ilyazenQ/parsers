<?php

namespace App\Service\FilterService;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class ProductFilterService {
    
    private array $filter = [];
    private array $sort = [];
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    )
    {
        
    }
    public function process(Request $request): void {
        $category = isset($request->query->all()['filter']['category'])? $request->query->all()['filter']['category']:null;
        $this->filter = $category ? ['Category'=> $this->categoryRepository->find($category)]:[];
        $sortField = isset($request->query->all()['sort']['field'])? $request->query->all()['sort']['field']:null;
        $sortVal = isset($request->query->all()['sort']['val'])? $request->query->all()['sort']['val']:null;
        $this->sort = ['diffPrice' => 'DESC'];
        if($sortField && $sortVal) {
            $this->sort = [$sortField => $sortVal];
        }
    }

    public function getFilter(): array {
        return $this->filter;
    }

    public function getSort(): array {
        return $this->sort;
    }
}