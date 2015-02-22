<?php

namespace Cli\Client;

use Cli\BaseCommand;
use Cli\ISPConfigWS;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetSitesByUserCommand extends BaseCommand
{
    /**
     * @var ISPConfigWS
     */
    protected $webService;
    protected $commandSetup = array(
        'name'        => 'get_sites_by_user',
        'description' => "Shows sites and its values belonging to the specified user.",
        'arguments'   =>
            array(
                array('name' => 'user_id', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid user ID.'),
                array('name' => 'group_id', 'type' => InputArgument::OPTIONAL, 'desc' => 'A valid group ID.')
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
            ->getClientSites()
            ->response());

        $table = new Table($output);
        foreach ($result as $domain)
            $table->addRow((array)$domain);

        $table->setHeaders(array('Domain', 'ID', 'Document Root', 'Active'))->render($output);
        exit(0);
    }
}