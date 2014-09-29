<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetSitesByUserCommand extends BaseCommand{

    protected $webService;
    protected $commandSetup = array(
        'name'        => 'get_sites_by_user',
        'description' => "Shows sites and its values belonging to the specified user.",
        'arguments'   =>
            array(
                array('name' => 'user_id', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid user ID.'),
                array('name' => 'group_id', 'type' => InputArgument::OPTIONAL, 'desc' => 'A valid group ID.')
            )
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
            ->getClientSites()
            ->response());

        var_dump ( $result);
        die();
        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}