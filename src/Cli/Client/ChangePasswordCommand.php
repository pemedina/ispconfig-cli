<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ChangePasswordCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('change_password')
            ->setDescription("Changes a client's password.")
            ->addArgument('client_id', InputArgument::REQUIRED, 'A valid client ID')
            ->addArgument('password', InputArgument::REQUIRED, 'A new password.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->client_change_password( $this->session_id, $input->getArgument('client_id'), $input->getArgument('password')));

        $output->writeln('<info>'.$result.'</info>');
    }
}