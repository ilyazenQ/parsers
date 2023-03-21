<?php

namespace App\Command;

use App\Repository\CategoryRepository;
use App\Service\ParserService\WBParserService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'parser:wb',
    description: 'Parse from WB',
)]
class ParserWbCommand extends Command
{
    public function __construct(
        private readonly WBParserService $parserService,
        private readonly CategoryRepository $categoryRepository,
        )
    {
        parent::__construct();
    }

    
    protected function configure(): void
    {
        $this
            ->addOption('cat', null, InputOption::VALUE_REQUIRED, 'Pass a category id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $catId = $input->getOption('cat');

        if (null === $catId) {
            $io->error('You must pass a category id');

            return Command::FAILURE;
        }
        $cat = $this->categoryRepository->findOrFail($catId);
        $this->parserService->process($cat);
        // Получаем содержимое страницы

        $io->success('Done: shop - wb, category - '. $cat->getSlug());

        return Command::SUCCESS;
    }
}