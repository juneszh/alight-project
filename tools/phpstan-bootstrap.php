<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$alightSource = getenv('ALIGHT_SOURCE_DIR');
if (!is_string($alightSource) || $alightSource === '') {
    return;
}

$alightSource = rtrim($alightSource, DIRECTORY_SEPARATOR);
if (!is_dir($alightSource)) {
    throw new RuntimeException('ALIGHT_SOURCE_DIR is not a directory: ' . $alightSource);
}

spl_autoload_register(
    static function (string $class) use ($alightSource): void {
        $prefix = 'Alight\\';
        if (!str_starts_with($class, $prefix) || str_starts_with($class, 'Alight\\Admin')) {
            return;
        }

        $relativeClass = substr($class, strlen($prefix));
        $file = $alightSource . DIRECTORY_SEPARATOR
            . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

        if (is_file($file)) {
            require $file;
        }
    },
    prepend: true,
);
