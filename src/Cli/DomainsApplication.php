<?php namespace Cli;

class DomainsApplication extends BaseApplication
{

    /**
     * @var ISPConfigWS
     */
    private $webservice;

    public function __construct(ISPConfigWS $webservice)
    {
        $this->webservice = $webservice;
        parent::__construct($this->webservice);

        $this->command(new Domains\DomainGetCommand($this->webservice));
        $this->command(new Domains\DomainAddCommand($this->webservice));
    }
}