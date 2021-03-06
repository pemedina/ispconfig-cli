<?php namespace Cli\Client;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DeleteEverythingCommand extends BaseCommand{

    protected $webService;
    protected $commandSetup = array(
        'name'        => 'delete_everything',
        'description' => "Deletes everything.",
        'arguments'   =>
            array(
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

    protected function configure()
    {
        parent::configure( $this->commandSetup);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = json_decode($this->webService
            ->with($input->getArguments())
            ->deleteClientEverything()
            ->response());
        $output->writeln('<info>'.$result.'</info>');
    }
}