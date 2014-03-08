<?php

namespace Cli\Mail;

use Cilex\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class UserUpdateCommand extends Command{
    protected function configure()
    {
        $this
            ->setName('user_update')
            ->setDescription('Adds a mail user')
            ->addArgument('type', InputArgument::REQUIRED, 'An example argument');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $c = $this->getContainer();
        $name = $c['console.name'];
        $output->writeln('<info>Example command for application: '.$name.'</info>');
    }
}