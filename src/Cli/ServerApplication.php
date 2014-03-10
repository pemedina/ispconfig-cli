<?php namespace Cli;

class ServerApplication extends BaseApplication  {

    public function __construct() {

        parent::__construct();

        $serverGetCommand = new Server\GetCommand();
        $this->command($serverGetCommand);

        $serverGetServerIdByIpCommand = new Server\GetServerIdByIpCommand();
        $this->command($serverGetServerIdByIpCommand);


    }
}