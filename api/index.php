<?php

// Force stderr logging to prevent read-only filesystem errors on Vercel
putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';

putenv('APP_ENV=production');
putenv('APP_DEBUG=false');
$_ENV['APP_ENV'] = 'production';
$_ENV['APP_DEBUG'] = 'false';

// Prepare writable /tmp storage structure
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

// Copy SQLite database to /tmp if exists
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

// Boot Laravel with custom storage path in /tmp
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->useStoragePath($tmpDir . '/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
