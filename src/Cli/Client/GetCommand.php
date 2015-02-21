<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetCommand extends BaseCommand
{

    /**
     * @var ISPconfigWS
     */
    protected $webService;
    protected $commandSetup = array(
        'name'        => 'get',
        'description' => "Retrieves information about a client.",
        'arguments'   => array(
            array('name' => 'client_id', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid client ID.')
        ),
        'options'     => array()
    );
    protected $supportsParamsFile = FALSE;

    /*
     * @property $webService \ISPConfigWS
     */
    function __construct($webService)
    {
        parent::__construct();
        $this->webService = $webService;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = json_decode($this->webService
            ->with($input->getArguments())
            ->getClient()
            ->response());

        $table = new Table($output);
        foreach ($result as $key => $value)
            $table->addRow([$key, $value]);

        $table->setHeaders(['Setting', 'Value'])->render($output);
    }
}