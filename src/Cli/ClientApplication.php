<?php namespace Cli;

use Cilex\Application as BaseApplication;

class ClientApplication extends BaseApplication  {

    const NAME='ISPconfig3 Client CLI interface';
    const VERSION="0.1";

    public function __construct() {
        parent::__construct(self::NAME, self::VERSION);

        $clientGetCommand = new Client\GetCommand();
        $this->command($clientGetCommand);

        $clientGetByUsernameCommand = new Client\GetByUsernameCommand();
        $this->command($clientGetByUsernameCommand);


    }
}