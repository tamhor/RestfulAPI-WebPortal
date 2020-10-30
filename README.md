# CodeIgniter 4 Restful API for Web Portal

## Installation

- $ git clone https://github.com/tamhor/RestfulAPI-WebPortal
- $ cd RestfulAPI-WebPortal
- $ cp env .env
- // setting your baseURL and databases, dont forget to remove #
- $ php spark migrate
- $ php spark db:seed (optional)
- $ php spark serve

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
