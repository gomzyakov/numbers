<?php

use Gomzyakov\CS\Finder;
use Gomzyakov\CS\Config;

// Routes for analysis with `php-cs-fixer`
$routes = [
    __DIR__ . '/src',
    __DIR__ . '/tests',
];

return Config::createWithFinder(Finder::createWithRoutes($routes));
