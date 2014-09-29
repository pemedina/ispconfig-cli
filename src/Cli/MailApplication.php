<?php namespace Cli;

class MailApplication extends BaseApplication  {

    public function __construct() {

        parent::__construct();

        $domainGetCommand = new Mail\DomainGetCommand();
        $this->command($domainGetCommand);

        $domainGetByDomainCommand = new Mail\DomainGetByDomainCommand();
        $this->command($domainGetByDomainCommand);

        $userGetCommand = new Mail\UserGetCommand();
        $this->command($userGetCommand);

        $userAddCommand = new Mail\UserAddCommand();
        $this->command($userAddCommand);

        $userDeleteCommand = new Mail\UserDeleteCommand();
        $this->command($userDeleteCommand);

        $userGetCommand = new Mail\UserGetCommand();
        $this->command($userGetCommand);

        $userUpdateCommand = new Mail\UserUpdateCommand();
        $this->command($userUpdateCommand);
    }
}