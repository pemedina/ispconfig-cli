<?php namespace Cli;

class DomainsApplication extends BaseApplication  {

    public function __construct() {

        parent::__construct();

        $domainGetCommand = new Domains\DomainGetCommand();
        $this->command($domainGetCommand);

        $domainAddCommand = new Domains\DomainAddCommand();
        $this->command($domainAddCommand);
    }
}