<?php namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DeleteCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('delete')
            ->setDescription("Deletes a client.")
            ->addArgument('client_id', InputArgument::REQUIRED, 'A valid client ID');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->client_delete( $this->session_id, $input->getArgument('client_id')));

        $output->writeln('<info>'.$result.'</info>');
    }
}