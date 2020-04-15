<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'db' => [
            // 'database'  => 'listings_db',
             'host'      => 'localhost',
             'driver'   => 'Pdo_Mysql',
             'dsn'      => 'mysql:dbname=php_quiz;host=localhost',
             'username'  => 'admin',
             'password'  => '65403',
             'charset'   => 'utf8',
             'collation' => 'utf8_unicode_ci',

         ],
    ],
];
