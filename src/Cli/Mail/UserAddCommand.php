<?php

namespace Cli\Mail;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class UserAddCommand extends BaseCommand{

    protected function configure()
    {
        parent::configure();
        $this
            ->setName('user_add')
            ->setDescription('Adds a mail user')
            ->addArgument('type', InputArgument::REQUIRED, 'An example argument')
            ->addOption('param-file', null, InputOption::VALUE_OPTIONAL , 'Full path to a YAML file containing additional parameters.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {


    }
}