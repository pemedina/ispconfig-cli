<?php namespace Cli;

use Cilex\Command\Command as Command;
use Symfony\Component\Console\Output\OutputInterface;

class BaseCommand extends Command
{

    protected $session_id;
    protected $client;

    protected function getSoapClient ( $config )
    {
        return new \SoapClient(
            NULL,
            array('location'   => $config->host . '/remote/index.php',
                  'uri'        => $config->host . '/remote/',
                  'trace'      => 1,
                  'exceptions' => 1)
        );
    }

    protected function buildSoapSession ( $config )
    {
        if ( null == $this->client )
            $this->client = $this->getSoapClient( $config );

        try {
            $this->session_id = $this->client->login($config->user, $config->pass);
        } catch (\Exception $e) {
            throw new \Exception( $e->getMessage());
        }

        return $this ;
    }

    protected function setSoapSession ( OutputInterface $output )
    {
        try {
            $this->buildSoapSession( $this->getService('config'));
        }
        catch ( \Exception $e ) {
            $output->writeln('<error>'.$e->getMessage().'</error>');
            die();
        }
        return $this;
    }

    protected function validateResult ( $result )
    {
        if ( !$result)
            throw new \Exception ( 'No results');

        return $result ;
    }
}