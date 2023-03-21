<?php

namespace App\Service\ParserService;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FetchWBService{ 

    public function __construct(
        private readonly HttpClientInterface $client,

    ) {

    }

    public function fetch(string $url): array {

        $response = $this->client->request('GET', $url,   
            [
                'headers' => [
                'Content-Type' => 'application/json',
            ]],);
        $data = $response->toArray()['data']['products'];
        return $data;
    }
}