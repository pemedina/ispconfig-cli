# ISPConfig 3 CLI interface
-----------

ISPconfig3-cli is a library designed to interact with [ISPconfig3](http://www.ispconfig.org). It aims to provide a simple command line interface to
perform all actions provided by [ISPconfig remote API](http://docs.ispconfig.org/development/remote-api/).


## Quick start
-----------

Clone this repository. Edit config/{environment}.json with your ISPconfig remote details.
All commands are locate under bin/

## Commands
```
# Mail
bin/mail domain_get 4

bin/mail domain_get_by_domain domain


# Server
bin/server get 1

bin/server_get_by_ip 111.222.333.444

# General
bin/get functions_list

```

## Credits
- [Cilex](https://github.com/Cilex)
- [ISPconfig3](http://www.ispconfig.org)
