<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$configFile = $root . '/config/app.php';

if (!is_file($configFile)) {
    echo "Skipped route cache cleanup: config/app.php does not exist.\n";
    return;
}

require $root . '/vendor/autoload.php';

Alight\Router::clearCache();
