<?php

namespace Cli\Server;

use Cli\BaseCommand;
use Cli\ISPConfigWS;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetserverIdByIpCommand extends BaseCommand
{

    protected $commandSetup = array(
        'name'        => 'get_by_ip',
        'description' => 'Returns server information by its IP.',
        'arguments'   =>
            array(
                array('name' => 'server_id', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid server IP.')
            ),
        'options'     => array()
    );


    /**
     * @param ISPConfigWS $webService
     */
    public function __construct(ISPConfigWS $webService)
    {
        parent::__construct();
        $this->webService = $webService;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = json_decode($this->webService
            ->with($input->getArguments())
            ->getServerByIp()
            ->response());

        $table = new Table($output);


        foreach ($result as $section)
        {
            foreach ($section as $key => $value)
                $table->addRow(array($key, $value));

            $table->setHeaders(array('Setting', 'Value'))->render($output);
        }

    }
}