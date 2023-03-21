<?php

namespace App\Service\ParserService;

use App\Entity\Category;

interface ParserServiceInterface {
    public function process(Category $category): void;
}