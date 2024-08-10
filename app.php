<?php

require 'vendor/autoload.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidOptionException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;

(new SingleCommandApplication('app'))
    ->setVersion('1.0.0')
    ->addArgument('src', mode: InputArgument::REQUIRED, description: 'The path of the image or directory of images to resize.')
    ->addOption('format', mode: InputOption::VALUE_OPTIONAL, default: '3:2', suggestedValues: ['3:2', '4:3', '16:9'])
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        $ratio = match ($input->getOption('format')) {
            '3:2' => 2 / 3,
            '4:3' => 3 / 4,
            '16:9' => 9 / 16,
            default => throw new InvalidOptionException('Invalid format'),
        };

        $source = new \SplFileInfo($input->getArgument('src'));
        if (!$source->isReadable()) {
            throw new InvalidOptionException('Invalid source');
        }

        return Command::SUCCESS;
    })
    ->run();
