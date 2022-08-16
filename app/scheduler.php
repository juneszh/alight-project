<?php

declare(strict_types=1);

require dirname(__FILE__, 2) . '/vendor/autoload.php';

$opts = getopt('r:j:');
$execCode = $opts['r'] ?? null;
$execJob = $opts['j'] ?? null;

Alight\Job::start('config/app.php', $execCode, $execJob);
