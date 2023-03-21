<?php

namespace App\Service\ParserService;

interface FetchServiceInterface {
    public function fetch(string $url): array;
}