<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    throw new Exception('PHP-CLI required.');
}

require dirname(__FILE__, 2) . '/vendor/autoload.php';

$opts = getopt('r:f:');
$execCode = ($opts['r'] ?? '') ?: null;
$execHandler = ($opts['f'] ?? '') ?: null;

Alight\Job::start('config/app.php', $execCode, $execHandler);
