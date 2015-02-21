<?php namespace Cli;

use Cilex\Command\Command as Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Base class for all commands of the App.
 *
 */
class BaseCommand extends Command
{

    protected $commandSetup = array('name' => '', 'arguments' => array(), 'options' => array());
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
            ->setName($this->commandSetup['name'])
            ->setDescription($this->commandSetup['description']);

        foreach ($this->commandSetup['arguments'] as $argument)
            $this->addArgument($argument['name'], $argument['type'], $argument['desc']);

        foreach ($this->commandSetup['options'] as $option)
            $this->addOption($option['name'], null, $option['type'], $option['desc']);

        if ($this->supportsParamsFile)
            $this->addOption('param-file', null, InputOption::VALUE_OPTIONAL, 'Full path to a parameters file.');
    }

    protected function renderValue(OutputInterface $output, $response)
    {
        $this->exitIfError($output, $response);
        $output->writeln("<info>{$response->result}</info>");
        exit(0);
    }

    private function exitIfError(OutputInterface $output, $response)
    {
        if (isset($response->error)) {
            $output->writeln("<error>{$response->error->message}</error>");
            exit(1);
        }
    }

    protected function sanitizeParameters(InputInterface $input)
    {
        $parameters = array_merge($input->getArguments(), $input->getOptions());
        unset($parameters['command']);
        return array_filter($parameters);
    }

}