<?php namespace Cli;

class ClientApplication extends BaseApplication
{
    /**
     * @var ISPConfigWS
     */
    private $webservice;

    public function __construct( ISPConfigWS $webservice)
    {
        $this->webservice = $webservice;
        parent::__construct($this->webservice);

        $clientGetCommand = new Client\GetCommand($this->webservice);
        $this->command($clientGetCommand);

        $clientGetByUsernameCommand = new Client\GetByUsernameCommand($this->webservice);
        $this->command($clientGetByUsernameCommand);

        $clientGetIdCommand = new Client\GetIdCommand($this->webservice);
        $this->command($clientGetIdCommand);

        $clientChangePasswordCommand = new Client\ChangePasswordCommand($this->webservice);
        $this->command($clientChangePasswordCommand);

        $clientGetSitesByUserCommand = new Client\GetSitesByUserCommand($this->webservice);
        $this->command($clientGetSitesByUserCommand);

        $clientDeleteCommand = new Client\DeleteCommand($this->webservice);
        $this->command($clientDeleteCommand);

    }
}