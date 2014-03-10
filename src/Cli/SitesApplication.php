<?php namespace Cli;

class SitesApplication extends BaseApplication  {

    public function __construct() {

        parent::__construct();

        $webDomainGetCommand = new Sites\WebDomainGetCommand();
        $this->command($webDomainGetCommand);
    }
}