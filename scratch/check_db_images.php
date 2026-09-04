<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== HERO BANNERS IN DB ===\n";
foreach (\App\Models\HeroBanner::all() as $hb) {
    echo "ID: {$hb->id} | Title: {$hb->title} | Image: {$hb->image_path}\n";
}

echo "\n=== TEACHERS IN DB ===\n";
foreach (\App\Models\Teacher::all() as $t) {
    echo "ID: {$t->id} | Name: {$t->name} | Photo: {$t->photo_path}\n";
}

echo "\n=== EXTRACURRICULARS IN DB ===\n";
foreach (\App\Models\Extracurricular::all() as $e) {
    echo "ID: {$e->id} | Name: {$e->title} | Image: {$e->image_path}\n";
}
