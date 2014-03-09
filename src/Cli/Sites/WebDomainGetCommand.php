<?php

namespace Cli\Sites;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class WebDomainGetCommand
 * @package Cli\Mail
 */
class WebDomainGetCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('web_domain_get')
            ->setDescription('Retrieves information about a web domain.')
            ->addArgument('domain_id', InputArgument::REQUIRED, 'A valid domain id');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession( $output )
            ->validateResult($this->client->sites_web_domain_get( $this->session_id, $input->getArgument('domain_id')));

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}