<?php namespace Cli;

use Cilex\Application as BaseApplication;

class DomainsApplication extends BaseApplication  {

    const NAME='ISPconfig3 Server Domains CLI interface';
    const VERSION="0.1";

    public function __construct() {
        parent::__construct(self::NAME, self::VERSION);

        $domainGetCommand = new Domains\DomainGetCommand();
        $this->command($domainGetCommand);

        $domainAddCommand = new Domains\DomainAddCommand();
        $this->command($domainAddCommand);


    }
}