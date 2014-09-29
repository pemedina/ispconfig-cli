<?php namespace Cli;

use Cilex\Application as CilexApplication;
use Cilex\Provider\ConfigServiceProvider as ConfigServiceProvider;

class BaseApplication extends CilexApplication
{

    const NAME    = 'ISPconfig3 CLI interface';
    const VERSION = "0.2";


    public function __construct( $webService )
    {
        $environment = getenv('ISPCONFIG_ENV') ? : 'development';
        $this->register(new ConfigServiceProvider(), array('config.path' => __DIR__ . "/../../config/$environment.json"));
        foreach ( $this['config'] as $key => $value )
        {
            $config[$key]=$value;
        }
        $webService->init($config);
        parent::__construct(self::NAME, self::VERSION);
    }
}