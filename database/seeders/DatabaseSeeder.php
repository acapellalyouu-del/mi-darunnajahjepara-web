<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default settings only if they don't exist yet
        \App\Models\Setting::firstOrCreate(['key' => 'school_name'], ['value' => 'MI Darun Najah', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'school_logo'], ['value' => '/images/logo.png', 'type' => 'image']);
        \App\Models\Setting::firstOrCreate(['key' => 'school_npsn'], ['value' => '60721456 / Grade A', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'school_cover_image'], ['value' => '/storage/settings/UEP3gAeb99SzMlSKCbRTmxI4RWKWerSnCPvtOH3G.png', 'type' => 'image']);
        \App\Models\Setting::firstOrCreate(['key' => 'school_history'], ['value' => 'Founded in 1985, MI Darun Najah began as a small community initiative to provide balanced religious and formal education. Over the decades, it has evolved into a comprehensive campus serving over 800 students. Our history is rooted in the philosophy of \'Najah\' (Success), aimed at both this life and the hereafter...', 'type' => 'textarea']);
        \App\Models\Setting::firstOrCreate(['key' => 'school_vision'], ['value' => 'To become a leading Islamic educational institution that excels in character, academics, and spiritual devotion.', 'type' => 'textarea']);
        \App\Models\Setting::firstOrCreate(['key' => 'school_mission'], ['value' => '<ul><li>Fostering Quranic values in daily life.</li><li>Providing high-quality STEM education.</li><li>Nurturing future leaders with integrity.</li></ul>', 'type' => 'textarea']);
        \App\Models\Setting::firstOrCreate(['key' => 'headmaster_name'], ['value' => 'Dr. H. Ahmad Fauzi, M.Pd.', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'headmaster_photo'], ['value' => '/storage/settings/h9tVOdP8Tof05m2IHvS1dCYGOaFLJyKhg2LGEnQV.png', 'type' => 'image']);
        \App\Models\Setting::firstOrCreate(['key' => 'headmaster_greeting'], ['value' => '"Assalamu\'alaikum Warahmatullahi Wabarakatuh. Welcome to our digital portal. We are committed to nurturing the next generation of pious and intelligent leaders..."', 'type' => 'textarea']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_email'], ['value' => 'midarunnajahjepara@gmail.com', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_phone'], ['value' => '+62 812 3456 7890', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_whatsapp'], ['value' => '+62 812 3456 7890', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_address'], ['value' => 'Jl. Kauman, Desa Srobyong RT.04/RW.02, Kec. Mlonggo, Kabupaten Jepara, Jawa Tengah 59452', 'type' => 'textarea']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_hours'], ['value' => 'Senin - Sabtu: 07.00 - 15.00 WIB', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_instagram'], ['value' => '@mi_darunnajah', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_youtube'], ['value' => '', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_facebook'], ['value' => '', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'contact_maps'], ['value' => 'https://www.google.com/maps/embed?pb=!1m0!4m2!3m1!1s0x2e71220b291fa277:0x56057d7d4f06f570!6m8!1m7!1s2ojEInFwjsk_gIbIPeeWHw!2m2!1d-6.5203405!2d110.7086687!3f250.65!2f0!5f0.7820853872224151', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'announcement_bar_text'], ['value' => 'Selamat Datang di Website Resmi MI Darun Najah Jepara!', 'type' => 'text']);
        \App\Models\Setting::firstOrCreate(['key' => 'announcement_bar_active'], ['value' => '1', 'type' => 'boolean']);

        // Check if admin user exists, if not create one
        \App\Models\User::firstOrCreate(
            ['email' => 'midarunnajahjepara@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => 'adminpassword123',
            ]
        );

        \App\Models\User::firstOrCreate(
            ['email' => 'lyounaaroueess@gmail.com'],
            [
                'name' => 'Lya (Admin)',
                'password' => 'TehSisriGulaBatu',
            ]
        );
    }
}
