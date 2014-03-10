<?php namespace Cli;

class GetApplication extends BaseApplication  {

    public function __construct() {

        parent::__construct();

        $functionListCommand = new Get\FunctionListCommand();
        $this->command($functionListCommand);

    }
}