<?php namespace Cli;

use Cilex\Application as BaseApplication;

class ServerApplication extends BaseApplication  {

    const NAME='ISPconfig3 Server CLI interface';
    const VERSION="0.1";

    public function __construct() {
        parent::__construct(self::NAME, self::VERSION);

        $serverGetCommand = new Server\GetCommand();
        $this->command($serverGetCommand);

        $serverGetServerIdByIpCommand = new Server\GetServerIdByIpCommand();
        $this->command($serverGetServerIdByIpCommand);


    }
}