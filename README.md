# ISPConfig 3 CLI interface


ISPconfig3-cli is a library designed to interact with [ISPConfig3](http://www.ispconfig.org). It aims to provide a simple command line interface to
perform all actions provided by [ISPConfig remote API](http://docs.ispconfig.org/development/remote-api/).


## Installation

 1. `git clone` _this_ repository.
 2. Download composer: `curl -s https://getcomposer.org/installer | php`
 3. Install  dependencies: `php composer.phar install`
 4. Edit `config/development.json` with your ISPconfig remote details.

## Usage

```
### Mail
bin/mail domain_get 4

bin/mail domain_get_by_domain domain


### Server
bin/server get 1

bin/server_get_by_ip 111.222.333.444


### General
bin/get functions_list
```

## Credits
- [Cilex](https://github.com/Cilex)
- [ISPConfig](http://www.ispconfig.org)
