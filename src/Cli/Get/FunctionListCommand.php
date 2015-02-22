<?php namespace Cli\Get;

use Cli\BaseCommand;
use Cli\ISPConfigWS;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FunctionListCommand extends BaseCommand
{

    protected $commandSetup = array(
        'name'        => 'function_list',
        'description' => "Shows all available remote API functions.",
        'arguments'   => [],
        'options'     => array()

    );
    protected $supportsParamsFile = FALSE;

    /*
  * @property $webService ISPConfigWS
  */
    public function __construct(ISPConfigWS $webService)
    {
        parent::__construct();
        $this->webService = $webService;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = json_decode($this->webService->getFunctionsList()->response());

        $table = new Table($output);
        $table->setHeaders(array('Function Name'));
        foreach ($result as $functionName)
            $table->addRow(array($functionName));

        $table->render($output);

    }
}