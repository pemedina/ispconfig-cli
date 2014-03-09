<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('get')
            ->setDescription('Retrieves information about a client.')
            ->addArgument('client_id', InputArgument::REQUIRED, 'A valid client ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->client_get( $this->session_id, $input->getArgument('client_id')));

        $table = $this->getHelperSet()->get('table');
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

            $table->setLayout(2)->setHeaders(array('Setting', 'Value'))->render($output);
    }
}