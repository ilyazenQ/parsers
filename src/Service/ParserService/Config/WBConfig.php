<?php

namespace App\Service\ParserService\Config;

use App\Entity\ShopVendor;
use App\Repository\ShopVendorRepository;

class WBConfig
{
    const CATEGORY_CONFIG = [
        'Shoes' =>
            [
                'url' => "https://catalog.wb.ru/catalog/men_shoes/catalog?appType=1&cat=751&couponsGeo=2,12,7,3,6,21,16&curr=rub&dest=123585462&emp=0&fbrand=21;61;154;234;255;370;398;524;671;758;777;915;1616;1876;2298;2428;2495;3449;6158;60361&fsize=37404;38386;39368;40350;56158;56167;56168&fsupplier=-100;276&lang=ru&locale=ru&priceU=120000;2301600&pricemarginCoeff=1.0&reg=0&regions=80,64,38,4,83,33,70,69,30,86,40,1,66,48,22,31,113&sort=priceup&spp=0",
                'id' => 1,
                'skip_subject' => [107],
            ],
        'Outerwear' => [
            'url' => "https://catalog.wb.ru/catalog/men_clothes1/catalog?appType=1&cat=63011&couponsGeo=2,12,7,3,6,21,16&curr=rub&dest=123585462&emp=0&fbrand=21;61;154;222;255;398;524;551;671;758;777;915;1616;1876;2298;2362;2428;3449;11756;20253&fsize=56089;56208;56217;56218;56404;56408&fsupplier=-100;276&lang=ru&locale=ru&pricemarginCoeff=1.0&reg=0&regions=80,64,38,4,83,33,70,69,30,86,40,1,66,48,22,31,113&sort=popular&spp=0",
            'id' => 2,
            'skip_subject' => [],
        ]
    ];

    public function __construct(
        private readonly ShopVendorRepository $shopVendorRepository,
    ) {
    }

    public function getShopVendor(): ShopVendor
    {
        return $this->shopVendorRepository->findOneBy(['title' => 'WB']);
    }

    public function generateLink(mixed $id): string
    {
        return "https://www.wildberries.ru/catalog/{$id}/detail.aspx";
    }
}