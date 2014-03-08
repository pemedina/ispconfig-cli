<?php namespace Cli;

use Cilex\Application as BaseApplication;

class GetApplication extends BaseApplication  {

    const NAME='ISPconfig3 CLI interface';
    const VERSION="0.1";

    public function __construct() {
        parent::__construct(self::NAME, self::VERSION);
        $functionListCommand = new Get\FunctionListCommand();
        $this->command($functionListCommand);

    }
}