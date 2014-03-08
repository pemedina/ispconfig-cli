<?php

namespace Cli\Server;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetserverIdByIpCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('get_server_by_ip')
            ->setDescription('Returns server information by its IP..')
            ->addArgument('ip_address', InputArgument::REQUIRED, 'A valid server IP');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->server_get_serverid_by_ip( $this->session_id, $input->getArgument('ip_address')));

        $table = $this->getHelperSet()->get('table');
        foreach ( $result[0] as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}