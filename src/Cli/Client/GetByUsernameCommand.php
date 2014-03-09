<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetByUsernameCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('get_by_username')
            ->setDescription('Shows client information of user.')
            ->addArgument('username', InputArgument::REQUIRED, 'A valid username');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->client_get_by_username( $this->session_id, $input->getArgument('username')));

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}