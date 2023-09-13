<?php

declare(strict_types=1);

require dirname(__FILE__, 2) . '/vendor/autoload.php';

if (PHP_SAPI !== 'cli') {
    throw new Exception('PHP-CLI required.');
}

Alight\Job::start();
