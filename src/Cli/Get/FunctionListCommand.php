<?php namespace Cli\Get;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FunctionListCommand extends BaseCommand{

    protected function configure()
    {
        $this
            ->setName('function_list')
            ->setDescription('Shows all available remote API functions.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setSoapSession ( $output );
        $result = $this->client->get_function_list( $this->session_id);

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        $table->setHeaders(array('Function Name'));
        foreach ( array_values($result) as  $functionName)
            $table->addRow(array( $functionName));

        $table->render($output);

    }
}