<?php namespace Cli;

use Cilex\Application as BaseApplication;

class SitesApplication extends BaseApplication  {

    const NAME='ISPconfig3 Sites CLI interface';
    const VERSION="0.1";

    public function __construct() {
        parent::__construct(self::NAME, self::VERSION);

        $webDomainGetCommand = new Sites\WebDomainGetCommand();
        $this->command($webDomainGetCommand);
    }
}