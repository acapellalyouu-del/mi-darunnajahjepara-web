<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

putenv('APP_ENV=production');
putenv('APP_DEBUG=true');
$_ENV['APP_ENV'] = 'production';
$_ENV['APP_DEBUG'] = 'true';

$tmpDir = '/tmp';
@mkdir($tmpDir . '/storage/framework/views', 0777, true);
@mkdir($tmpDir . '/storage/framework/sessions', 0777, true);
@mkdir($tmpDir . '/storage/framework/cache', 0777, true);
@mkdir($tmpDir . '/storage/framework/testing', 0777, true);
@mkdir($tmpDir . '/storage/logs', 0777, true);
@mkdir($tmpDir . '/storage/app/public', 0777, true);

putenv('APP_STORAGE=' . $tmpDir . '/storage');
putenv('VIEW_COMPILED_PATH=' . $tmpDir . '/storage/framework/views');
$_ENV['APP_STORAGE'] = $tmpDir . '/storage';
$_ENV['VIEW_COMPILED_PATH'] = $tmpDir . '/storage/framework/views';

putenv('APP_KEY=base64:ZvPHpC93tx1xP1wIigjbeuhHA0/bWFMViZCwJI3vCy0=');
$_ENV['APP_KEY'] = 'base64:ZvPHpC93tx1xP1wIigjbeuhHA0/bWFMViZCwJI3vCy0=';

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

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo '<h1>Laravel Vercel Error</h1>';
    echo '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ':' . $e->getLine() . '</p>';
    echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}
