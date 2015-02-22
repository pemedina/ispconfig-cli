<?php namespace Cli;

class MailApplication extends BaseApplication
{

    /**
     * @var ISPConfigWS
     */
    private $webservice;

    public function __construct(ISPConfigWS $webservice)
    {
        $this->webservice = $webservice;
        parent::__construct($this->webservice);

        $this->command(new Mail\DomainGetCommand($this->webservice));
        $this->command(new Mail\DomainAddCommand($this->webservice));
        $this->command(new Mail\DomainGetByDomainCommand($this->webservice));
        $this->command(new Mail\UserGetCommand($this->webservice));
        $this->command(new Mail\UserAddCommand($this->webservice));
        $this->command(new Mail\UserDeleteCommand($this->webservice));
        $this->command(new Mail\UserGetCommand($this->webservice));
        $this->command(new Mail\UserUpdateCommand($this->webservice));
    }
}