<?php

use Framework\Config\Config;

Config::set('siteName', 'My Test Site');
Config::set(
    'routes',
    [
        'backend' => 'admin'
    ]
);

Config::set(
    'languages',
    [
        'en',
        'fr',
        'ru',
        'de',
    ]
);
Config::set('defaultLanguage', 'en');
Config::set('defaultRoute', 'frontend');
Config::set('defaultController', 'page');
Config::set('defaultAction', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.pass', '');
Config::set('db.name', 'mvc');
Config::set('db.charset', 'utf8');