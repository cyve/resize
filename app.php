<?php

require 'vendor/autoload.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;

(new SingleCommandApplication('app'))
    ->setCode(function (InputInterface $input, OutputInterface $output) {

        return Command::SUCCESS;
    })
    ->run();
