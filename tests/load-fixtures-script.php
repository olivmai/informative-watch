<?php

error_reporting(-1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

if (!isset($argv[1])) {
    echo "ERR: yous should specify on wich env you want to run fixtures ('dev' or 'test') \n";
    echo "For example you could try something like: php tests/load-fixtures-script.php dev \n";
    exit();
}
if ("dev" === $argv[1]) {
    require_once __DIR__ . '/../config/db_config.php';
}
if ("test" === $argv[1]) {
    require_once __DIR__ . '/../config/db_config_test.php';
}


use Test\FixturesLoader;

try {
    FixturesLoader::load();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

echo "Fixtures loaded successfully \n";

