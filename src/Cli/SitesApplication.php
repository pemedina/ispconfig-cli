<?php namespace Cli;

class SitesApplication extends BaseApplication
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
        $this->command(new Sites\WebDomainGetCommand($this->webservice));
    }
}