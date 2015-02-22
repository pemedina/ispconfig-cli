<?php

namespace Cli\Mail;

use Cli\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class DomainAddCommand
 * @package Cli\Mail
 */
class DomainAddCommand extends BaseCommand{

    /**
     * @var ISPConfigWS
     */
    protected $webService;
    protected $commandSetup = array(
        'name'        => 'add',
        'description' => "Add a client.",
        'arguments'   => array(
            array('name' => 'username', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid username.'),
            array('name' => 'contact_name', 'type' => InputArgument::REQUIRED, 'desc' => 'A valid contact name.')
        ),
        'options'     => array(
            array('name' => 'city', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'country', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'customer_no', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'default_dbserver', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'default_dnsserver', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'default_mailserver', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'default_webserver', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'email', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'fax', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'icq', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'internet', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'language', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_client', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_cron', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_cron_frequency', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_cron_type', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_database', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_dns_record', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_dns_slave_zone', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_dns_zone', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_fetchmail', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_ftp_user', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailalias', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailaliasdomain', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailbox', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailcatchall', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_maildomain', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailfilter', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailforward', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailquota', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_mailrouting', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_shell_user', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_spamfilter_policy', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_spamfilter_user', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_spamfilter_wblist', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_traffic_quota', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_web_aliasdomain', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_web_domain', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_web_ip', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_web_quota', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_web_subdomain', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'limit_webdav_user', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'mobile', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'notes', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'parent_client_id', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'password', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'ssh_chroot', 'type' => InputOption::VALUE_REQUIRED, 'desc' => ''),
            array('name' => 'state', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'street', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'telephone', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'template_additional', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'template_master', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'usertheme', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'vat_id', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
            array('name' => 'web_php_options', 'type' => InputOption::VALUE_REQUIRED, 'desc' => ''),
            array('name' => 'zip', 'type' => InputOption::VALUE_OPTIONAL, 'desc' => ''),
        )
    );
    protected $supportsParamsFile = FALSE;


    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $result = $this
            ->setSoapSession( $output )
            ->validateResult($this->client->mail_domain_add( $this->session_id, $input->getArgument('domain_id')));

        $table = $this->getHelperSet()->get('table')->setLayout(1);
        foreach ( $result as  $key=> $value)
            $table->addRow(array( $key,$value));

        $table->setHeaders(array('Setting', 'Value'))->render($output);
    }
}