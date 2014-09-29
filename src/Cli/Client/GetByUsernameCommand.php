<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Cli\ISPConfigWS;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetByUsernameCommand extends BaseCommand
{

    /**
     * @var ISPConfigWS
     */
    protected $webService;
    protected $commandSetup = array(
        'name'        => 'get_by_username',
        'description' => "Shows client information of user.",
        'arguments'   =>
            array(
                array('name' => 'username', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid username.')
            )
    );
    protected $supportsParamsFile = FALSE;

    /*
 * @property $webService ISPConfigWS
 */
    public function __construct( ISPConfigWS $webService)
    {
        parent::__construct();
        $this->webService = $webService;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = json_decode($this->webService
            ->with($input->getArguments())
            ->getClientByUsername()
            ->response());

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ($result as $key => $value)
            $table->addRow(array($key, $value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}