<?php
return [
    'app' => [
        'debug' => false,
        'timezone' => null,
        'storagePath' => 'storage',
        'domainLevel' => 2,
        'corsDomain' => null,
        'corsHeaders' => null,
        'corsMethods' => null,
        'cacheAdapter' => null,
        'errorHandler' => null,
        'errorPageHandler' => null,
    ],
    'route' => [
        'config/route/web.php'
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
