<?php namespace Cli;

class ClientApplication extends BaseApplication
{
    /**
     * @var ISPConfigWS
     */
    private $webservice;

    public function __construct(ISPConfigWS $webservice)
    {
        $this->webservice = $webservice;
        parent::__construct($this->webservice);

        $this->command(new Client\GetCommand($this->webservice));
        $this->command(new Client\GetByUsernameCommand($this->webservice));
        $this->command(new Client\GetIdCommand($this->webservice));
        $this->command(new Client\ChangePasswordCommand($this->webservice));
        $this->command(new Client\GetSitesByUserCommand($this->webservice));
        $this->command(new Client\AddCommand($this->webservice));
        $this->command(new Client\DeleteCommand($this->webservice));
    }
}