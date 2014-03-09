<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetSitesByUserCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('get_sites_by_user')
            ->setDescription('Shows sites and its values belonging to the specified user.')
            ->addArgument('user_id', InputArgument::REQUIRED, 'A valid user id')
            ->addArgument('group_id', InputArgument::OPTIONAL, 'A valid group id');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->client_get_sites_by_user( $this->session_id, $input->getArgument('user_id')));

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}