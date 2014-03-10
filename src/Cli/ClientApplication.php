<?php namespace Cli;

class ClientApplication extends BaseApplication  {

    public function __construct() {

        parent::__construct();

        $clientGetCommand = new Client\GetCommand();
        $this->command($clientGetCommand);

        $clientGetByUsernameCommand = new Client\GetByUsernameCommand();
        $this->command($clientGetByUsernameCommand);

        $clientGetIdCommand = new Client\GetIdCommand();
        $this->command($clientGetIdCommand);

        $clientChangePasswordCommand = new Client\ChangePasswordCommand();
        $this->command($clientChangePasswordCommand);

        $clientGetSitesByUserCommand = new Client\GetSitesByUserCommand();
        $this->command($clientGetSitesByUserCommand);

        $clientDeleteCommand = new Client\DeleteCommand();
        $this->command($clientDeleteCommand);

        $clientDeleteEverythingCommand = new Client\DeleteEverythingCommand();
        $this->command($clientDeleteEverythingCommand);
    }
}