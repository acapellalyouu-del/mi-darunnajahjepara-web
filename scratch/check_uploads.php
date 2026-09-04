<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "--- CURRENT SETTINGS ---\n";
foreach (\App\Models\Setting::all() as $s) {
    echo $s->key . " => " . $s->value . "\n";
}

echo "\n--- UPLOADED SETTINGS FILES ---\n";
$files = glob(storage_path('app/public/settings/*'));
usort($files, function($a, $b) {
    return filemtime($b) - filemtime($a);
});
foreach ($files as $f) {
    echo date('Y-m-d H:i:s', filemtime($f)) . " - " . basename($f) . "\n";
}

echo "\n--- UPLOADED HERO BANNERS ---\n";
$heroFiles = glob(storage_path('app/public/hero-banners/*'));
usort($heroFiles, function($a, $b) {
    return filemtime($b) - filemtime($a);
});
foreach ($heroFiles as $f) {
    echo date('Y-m-d H:i:s', filemtime($f)) . " - " . basename($f) . "\n";
}

echo "\n--- UPLOADED TEACHERS ---\n";
$teacherFiles = glob(storage_path('app/public/teachers/*'));
usort($teacherFiles, function($a, $b) {
    return filemtime($b) - filemtime($a);
});
foreach ($teacherFiles as $f) {
    echo date('Y-m-d H:i:s', filemtime($f)) . " - " . basename($f) . "\n";
}
