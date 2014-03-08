<?php

namespace Cli\Mail;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class UserGetCommand extends BaseCommand{
    protected function configure()
    {
        $this
            ->setName('user_get')
            ->setDescription('Retrieves information about a mail user')
            ->addArgument('user_id', InputArgument::REQUIRED, 'A valid user_id');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession( $output )
            ->validateResult($this->client->mail_user_get( $this->session_id, $input->getArgument('user_id')));

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}