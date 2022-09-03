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
        'host' => 'localhost',
        'database' => 'alight',
        'username' => 'root',
        'password' => '',
    ],
    'cache' => [
        'type' => 'file'
    ],
    'job' => 'config/job.php',
];
