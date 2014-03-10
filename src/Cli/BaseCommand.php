<?php namespace Cli;

use Cilex\Command\Command as Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Base class for all commands of the App.
 *
 */
class BaseCommand extends Command
{

    protected $session_id;
    protected $client;

    /**
     * Initializes the soap client.
     *
     * @param Array $config Configuration values
     *
     * @return \SoapClient Object
     */
    protected function getSoapClient($config)
    {
        return new \SoapClient(
            NULL,
            array('location'         => $config->host . '/remote/index.php',
                  'uri'              => $config->host . '/remote/',
                  'trace'            => 1,
                  'allow_self_siged' => 1,
                  'exceptions'       => 1)
        );
    }

    /**
     * Creates a soap session_id.
     *
     * @param Array $config Configuration values
     *
     * @throws \Exception
     * @return \SoapClient Object
     */
    protected function buildSoapSession($config)
    {
        if (NULL == $this->client)
            $this->client = $this->getSoapClient($config);

        try {
            $this->session_id = $this->client->login($config->user, $config->pass);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $this;
    }

    /**
     * Create a SOAP connection used by all commands.
     *
     * @param OutputInterface $output
     *
     * @return Object
     */
    protected function setSoapSession(OutputInterface $output)
    {
        try {
            $this->buildSoapSession($this->getService('config'));
        } catch (\Exception $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');
            die();
        }
        return $this;
    }

    /**
     * Receive a soap response and throws an exception if empty..
     *
     * @param  String $result Soap Result.
     * @throws \Exception
     * @return String
     */
    protected function validateResult($result)
    {
        if (!$result)
            throw new \Exception ('No results');

        return $result;
    }
}