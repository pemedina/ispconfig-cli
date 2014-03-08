<?php

namespace Cli\Server;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('get')
            ->setDescription('Returns server information by its ID.')
            ->addArgument('server_id', InputArgument::REQUIRED, 'A valid server ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->server_get( $this->session_id, $input->getArgument('server_id')));


        $table = $this->getHelperSet()->get('table');
        foreach ( $result as $section)
        {
            foreach ( $section as  $key=> $value)
                $table->addRow(array( $key,$value));

            $table->setLayout(2)->setHeaders(array('Setting', 'Value'))->render($output);
        }
    }
}