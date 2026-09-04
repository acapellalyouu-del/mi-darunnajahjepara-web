<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Deleting demo Google URL entries from database...\n";

// Delete demo Hero Banners with Google URLs
$deletedBanners = \App\Models\HeroBanner::where('image_path', 'like', '%lh3.googleusercontent.com%')->delete();
echo "Deleted {$deletedBanners} demo hero banners.\n";

// Delete demo Teachers with Google URLs
$deletedTeachers = \App\Models\Teacher::where('photo_path', 'like', '%lh3.googleusercontent.com%')->delete();
echo "Deleted {$deletedTeachers} demo teachers.\n";

// Delete demo Extracurriculars with Google URLs
$deletedExtras = \App\Models\Extracurricular::where('image_path', 'like', '%lh3.googleusercontent.com%')->delete();
echo "Deleted {$deletedExtras} demo extracurriculars.\n";

// Restore settings if they are currently set to demo Google URLs
$settingsToRestore = [
    'school_logo' => '/images/logo.png',
    'school_cover_image' => '/storage/settings/UEP3gAeb99SzMlSKCbRTmxI4RWKWerSnCPvtOH3G.png',
    'headmaster_photo' => '/storage/settings/h9tVOdP8Tof05m2IHvS1dCYGOaFLJyKhg2LGEnQV.png'
];

foreach ($settingsToRestore as $key => $val) {
    $s = \App\Models\Setting::where('key', $key)->first();
    if ($s && str_contains($s->value, 'lh3.googleusercontent.com')) {
        $s->value = $val;
        $s->save();
        echo "Restored setting {$key} => {$val}\n";
    }
}

echo "Database cleanup completed!\n";
