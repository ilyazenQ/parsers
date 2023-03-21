<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use PHPHtmlParser\Dom;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'parser:wb',
    description: 'Parse from WB',
)]
class ParserWbCommand extends Command
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');


//$url ='https://www.wildberries.ru/catalog/obuv/muzhskaya?sort=priceup&page=1&fbrand=370%3B21%3B61%3B2428%3B2298%3B154%3B234%3B255%3B6158%3B3449%3B398%3B524%3B1616%3B671%3B2495%3B777%3B758%3B1876%3B915%3B60361&fsupplier=-100%3B276&priceU=120000%3B2301600&fsize=37404%3B56158%3B38386%3B56167%3B39368%3B56168%3B40350';
$page = 1;
$apiUrl = "https://catalog.wb.ru/catalog/men_shoes/catalog?appType=1&cat=751&couponsGeo=2,12,7,3,6,21,16&curr=rub&dest=123585462&emp=0&fbrand=21;61;154;234;255;370;398;524;671;758;777;915;1616;1876;2298;2428;2495;3449;6158;60361&fsize=37404;38386;39368;40350;56158;56167;56168&fsupplier=-100;276&lang=ru&locale=ru&page={$page}&priceU=120000;2301600&pricemarginCoeff=1.0&reg=0&regions=80,64,38,4,83,33,70,69,30,86,40,1,66,48,22,31,113&sort=priceup&spp=0";
$response = $this->client->request('GET', $apiUrl,   
[
    'headers' => [
    'Content-Type' => 'application/json',
]],);
dd($response->toArray());
// Получаем содержимое страницы

    $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

    return Command::SUCCESS;
}
}