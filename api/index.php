<?php

// Setup writable /tmp paths for Vercel AWS Lambda environment
$tmpDir = '/tmp';
@mkdir($tmpDir . '/storage/framework/views', 0777, true);
@mkdir($tmpDir . '/storage/framework/sessions', 0777, true);
@mkdir($tmpDir . '/storage/framework/cache', 0777, true);
@mkdir($tmpDir . '/storage/logs', 0777, true);

// Set environment variables for storage and fallback APP_KEY
putenv('APP_STORAGE=' . $tmpDir . '/storage');
putenv('VIEW_COMPILED_PATH=' . $tmpDir . '/storage/framework/views');
$_ENV['APP_STORAGE'] = $tmpDir . '/storage';
$_ENV['VIEW_COMPILED_PATH'] = $tmpDir . '/storage/framework/views';

if (empty(getenv('APP_KEY')) && empty($_ENV['APP_KEY'])) {
    putenv('APP_KEY=base64:ZvPHpC93tx1xP1wIigjbeuhHA0/bWFMViZCwJI3vCy0=');
    $_ENV['APP_KEY'] = 'base64:ZvPHpC93tx1xP1wIigjbeuhHA0/bWFMViZCwJI3vCy0=';
}

// Copy sqlite database if present
$srcDb = __DIR__ . '/../database/database.sqlite';
$dstDb = $tmpDir . '/database.sqlite';
if (file_exists($srcDb)) {
    @copy($srcDb, $dstDb);
} else {
    @touch($dstDb);
}
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . $dstDb);
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = $dstDb;

require __DIR__ . '/../public/index.php';
