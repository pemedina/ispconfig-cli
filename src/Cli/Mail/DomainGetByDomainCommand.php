<?php

namespace Cli\Mail;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DomainGetByDomainCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('domain_get_by_domain')
            ->setDescription('Shows information about target mail domain.')
            ->addArgument('domain', InputArgument::REQUIRED, 'A valid domain name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession ( $output )
            ->validateResult( $this->client->mail_domain_get_by_domain( $this->session_id, $input->getArgument('domain')));

        $table = $this->getHelperSet()->get('table');
        foreach ( $result[0] as  $key=> $value)
            $table->addRow(array( $key,$value));
        $table->setLayout(1)->setHeaders(array('Setting', 'Value'))->render($output);
    }
}