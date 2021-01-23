# Informative watch tool

Small php app to register useful and/or interesting sources to keep up-to-date on anything you have interest on.

> I developed this app mainly to practice php POO development (without framework) while trying to apply SOLID principles the most possible.

## Installation

You can have the app running locally by simply linking a database (running your database locally or via docker container for example) and then :

- create / update file ```config/db_config.php``` according to ```config/db_config.php.dist```
- run ```make start```
- browse your [Localhost](http://localhost:8000)

## Quality tools

You can run ```make check``` at any moment, it will run :

- php-cs-fixer
- phpstan analyze at highest level
- phpunit tests suite