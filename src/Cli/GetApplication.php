<?php namespace Cli;

class GetApplication extends BaseApplication
{

    /**
     * @var ISPConfigWS
     */
    private $webservice;

    /**
     * @param ISPConfigWS $webservice
     */
    public function __construct( ISPConfigWS $webservice) {

        $this->webservice = $webservice;
        parent::__construct( $this->webservice);

        $functionListCommand = new Get\FunctionListCommand(  $this->webservice);
        $this->command($functionListCommand);
    }
}