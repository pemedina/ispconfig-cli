<?php namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DeleteEverythingCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('delete_everything')
            ->setDescription("Deletes client.")
            ->addArgument('client_id', InputArgument::REQUIRED, 'A valid client ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->client_delete_everything( $this->session_id, $input->getArgument('client_id'), $input->getArgument('password')));

        $output->writeln('<info>'.$result.'</info>');
    }
}