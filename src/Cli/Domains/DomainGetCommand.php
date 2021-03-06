<?php

namespace Cli\Domains;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class DomainGetCommand
 * @package Cli\Domains
 */
class DomainGetCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('domain_get')
            ->setDescription('Retrieves information about a domain.')
            ->addArgument('domain_id', InputArgument::REQUIRED, 'A valid domain id');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession( $output )
            ->validateResult($this->client->domains_domain_get( $this->session_id, $input->getArgument('domain_id')));

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}