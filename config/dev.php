<?php

$app['debug'] = true;

$app['log.level'] = Monolog\Logger::DEBUG;

$app['db'] = [
    'db.options' => [
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'db_iclinic',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ]
];