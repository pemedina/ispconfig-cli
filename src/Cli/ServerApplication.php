<?php namespace Cli;

class ServerApplication extends BaseApplication
{

    /**
     * @var ISPConfigWS
     */
    private $webservice;

    /**
     * @param ISPConfigWS $webservice
     */
    public function __construct(ISPConfigWS $webservice)
    {
        $this->webservice = $webservice;
        parent::__construct($this->webservice);

        $serverGetCommand = new Server\GetCommand($this->webservice);
        $this->command($serverGetCommand);

        $serverGetServerIdByIpCommand = new Server\GetServerIdByIpCommand($this->webservice);
        $this->command($serverGetServerIdByIpCommand);
    }
}