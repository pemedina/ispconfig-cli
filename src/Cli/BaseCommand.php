<?php namespace Cli;

use Cilex\Command\Command as Command;
use Symfony\Component\Console\Input\InputOption;
/**
 * Base class for all commands of the App.
 *
 */
class BaseCommand extends Command
{

    protected $supportsParamsFile;
    protected $session_id;
    protected $client;

    /*
     * Configure the command
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName( $this->commandSetup['name'])
            ->setDescription( $this->commandSetup['description']);

        foreach ( $this->commandSetup['arguments'] as $argument )
            $this->addArgument( $argument['name'],$argument['type'], $argument['desc']);

        if ( $this->supportsParamsFile)
            $this->addOption( 'param-file',null,InputOption::VALUE_OPTIONAL,'Full path to a parameters file.');
    }
}