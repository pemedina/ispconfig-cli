<?php namespace Cli;

use Cilex\Application as BaseApplication;

class MailApplication extends BaseApplication  {

    const NAME='ISPconfig3 Mail CLI interface';
    const VERSION="0.1";

    public function __construct() {
        parent::__construct(self::NAME, self::VERSION);

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