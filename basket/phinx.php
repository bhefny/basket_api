<?php

require_once './vendor/autoload.php';
$settings = require './src/settings.php';
$app = new \Slim\App($settings);
$container = $app->getContainer();
require './src/dependencies.php';
$config = $container['settings']['db'];

return [
    'paths'                => [
        'migrations' => 'db/migrations',
        'seeds'      => 'db/seeds',
    ],
    // 'migration_base_class' => 'BaseMigration',

    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database'        => 'development',
        'development'             => [
            'name'       => $config['dbname'],
            'user'       => $config['user'],
            // 'host'      => $config['host'],
            'connection' => $container->get('db'),
        ],
        'production'              => [
            'adapter'   => $config['driver'],
            'host'      => $config['host'],
            'name'      => $config['dbname'],
            'user'      => $config['user'],
            'pass'      => $config['pass'],
            'port'      => $config['port'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];
