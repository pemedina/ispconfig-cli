<?php

namespace Cli\Mail;

use Cilex\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class UserDeleteCommand extends Command{
    protected function configure()
    {
        $this
            ->setName('user_delete')
            ->setDescription('Deletes a mail user')
            ->addArgument('type', InputArgument::REQUIRED, 'An example argument');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}