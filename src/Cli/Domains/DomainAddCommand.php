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
class DomainAddCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('domain_add')
            ->setDescription('Adds a new domain.')
            ->addArgument('client_id', InputArgument::REQUIRED, 'Client id')
            ->addArgument('domain', InputArgument::REQUIRED, 'A valid domain name');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $extraParams = array($input->getArgument('domain'));
        $result = $this
            ->setSoapSession( $output )
            ->validateResult($this->client->domains_domain_add( $this->session_id, $input->getArgument('client_id'), $extraParams));

        $output->writeln('<info>'.$result.'</info>');
    }
}