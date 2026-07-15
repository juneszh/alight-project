<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$directories = ['app', 'config', 'public', 'tools'];
$files = [];

foreach ($directories as $directory) {
    $path = $root . DIRECTORY_SEPARATOR . $directory;
    if (!is_dir($path)) {
        continue;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $files[] = $file->getPathname();
        }
    }
}

sort($files);
$failed = false;

foreach ($files as $file) {
    $command = escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($file);
    passthru($command, $status);
    $failed = $failed || $status !== 0;
}

if ($failed) {
    fwrite(STDERR, "PHP syntax validation failed.\n");
    exit(1);
}

echo sprintf("Validated %d PHP files.\n", count($files));
