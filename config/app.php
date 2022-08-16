<?php
return [
    'app' => [
        'debug' => false,
    ],
    'route' => [
        'config/routes/web.php'
    ],
    'database' => [
        'type' => 'mysql',
        'host' => '127.0.0.1',
        'database' => 'alight',
        'username' => 'root',
        'password' => '',
    ],
    'cache' => [
        'type' => 'file'
    ],
    'job' => 'config/job.php',
];
