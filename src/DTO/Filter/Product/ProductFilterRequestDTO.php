<?php

namespace App\DTO\Filter\Product;

use App\DTO\Parser\DTOInterface;

class ProductFilterRequestDTO implements DTOInterface
{
    public ?int $category;
    public ?string $sortField;
    public ?string $sortVal;

    public function __construct(array $queryParameters)
    {
        $this->category = (int)$queryParameters['filter']['category'] ?? null;
        $this->sortField = $queryParameters['sort']['field'] ?? 'diffPrice';
        $this->sortVal = $queryParameters['sort']['val'] ?? 'desc';
    }
}