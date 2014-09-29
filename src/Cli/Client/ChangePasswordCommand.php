<?php namespace Cli\Client;

use Cli\BaseCommand;
use Cli\WebServiceInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ChangePasswordCommand extends BaseCommand
{

    protected $webService;
    protected  $commandSetup = array(
        'name'        => 'change_password',
        'description' => "Changes a client's password.",
        'arguments'   =>
            array(
                array('name' => 'client_id', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid client ID.'),
                array('name' => 'password', 'type' => InputArgument::REQUIRED, 'desc' => 'A new password.'),
            )
    );
    protected $supportsParamsFile = FALSE;

    function __construct( $webService)
    {
        parent::__construct();
        $this->webService = $webService;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this
            ->setSoapSession($output)
            ->validateResult($this->client->client_change_password($this->session_id, $input->getArgument('client_id'), $input->getArgument('password')));

        $output->writeln('<info>' . $result . '</info>');
    }
}