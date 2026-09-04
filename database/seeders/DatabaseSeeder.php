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
        // Seed default settings
        \App\Models\Setting::updateOrCreate(['key' => 'school_name'], ['value' => 'MI Darun Najah', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'school_logo'], ['value' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuADgn0CG-9znfDIPAExU_JWv7835v6FyLjtdkjslAyPL5hzT-jXuSL63HsHcbKCQ34o90tBHYVvovqnRftbGVEp8KV_sYvoh1a7PC-GHoJwlgUQ3Md1B5VgcfyoTJ0Jn5prQXnmssLYW43MXB8IfbVdznR93Mowxucqej7L85tN9Jz5fGAYUaaHbBv8qildGc0J_UtEvfFIZa9u_SlUmql0AY_wil-9t64jT6Qxx9Bhba_sucu2Qu2G', 'type' => 'image']);
        \App\Models\Setting::updateOrCreate(['key' => 'school_npsn'], ['value' => '60721456 / Grade A', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'school_cover_image'], ['value' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAx9LPPubDDSId9eiBeXzdwNsKuyw8WUhBGMTQ1561RncZP0NCLNJMclQA8H6puIHe_EWh0DCRxebV_6KnHil4gYwJ42aTimiStl6nipgiPg_Q0M9se8b3L1K2P-hmxhqCPzfisFi_FGFg8wnFbuHQ1GWFpNqnQrN7_5jIauHyDLhTgjihkEfpz6UTAhRIvYdRChKHv7ZnVkA8u7Nj76baylvIj-1P4S1BFu26FuKwj1lgv__pmA25m', 'type' => 'image']);
        \App\Models\Setting::updateOrCreate(['key' => 'school_history'], ['value' => 'Founded in 1985, MI Darun Najah began as a small community initiative to provide balanced religious and formal education. Over the decades, it has evolved into a comprehensive campus serving over 800 students. Our history is rooted in the philosophy of \'Najah\' (Success), aimed at both this life and the hereafter...', 'type' => 'textarea']);
        \App\Models\Setting::updateOrCreate(['key' => 'school_vision'], ['value' => 'To become a leading Islamic educational institution that excels in character, academics, and spiritual devotion.', 'type' => 'textarea']);
        \App\Models\Setting::updateOrCreate(['key' => 'school_mission'], ['value' => '<ul><li>Fostering Quranic values in daily life.</li><li>Providing high-quality STEM education.</li><li>Nurturing future leaders with integrity.</li></ul>', 'type' => 'textarea']);
        \App\Models\Setting::updateOrCreate(['key' => 'headmaster_name'], ['value' => 'Dr. H. Ahmad Fauzi, M.Pd.', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'headmaster_photo'], ['value' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-iJ913cEi8hx22nInx5-4zR5WXOPADgOmW8YKxREJQx4iDze8fNm2x2kTjuuBO8F-Piy8dObi_zEOvquoUSH9g25PGTWl28LBHK0xut6gHwrQ2-wCxlsRBmcXFe4dUOJ5s-JHNVTFTqJKfhCGagFTc5g23Rrrkl5mIwxoJWh01YJDjZDwK0aUjMKtiPL1utb_YO9RzQZoASFfP5A8XhCmuAVRBRw-XPrTHBZfXOCUxDKtHD8GOnUf', 'type' => 'image']);
        \App\Models\Setting::updateOrCreate(['key' => 'headmaster_greeting'], ['value' => '"Assalamu\'alaikum Warahmatullahi Wabarakatuh. Welcome to our digital portal. We are committed to nurturing the next generation of pious and intelligent leaders..."', 'type' => 'textarea']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_email'], ['value' => 'midarunnajahjepara@gmail.com', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_phone'], ['value' => '+62 812 3456 7890', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_whatsapp'], ['value' => '+62 812 3456 7890', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_address'], ['value' => 'Jl. Kauman, Desa Srobyong RT.04/RW.02, Kec. Mlonggo, Kabupaten Jepara, Jawa Tengah 59452', 'type' => 'textarea']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_hours'], ['value' => 'Senin - Sabtu: 07.00 - 15.00 WIB', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_instagram'], ['value' => '@mi_darunnajah', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_youtube'], ['value' => '', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_facebook'], ['value' => '', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_maps'], ['value' => 'https://www.google.com/maps/embed?pb=!1m0!4m2!3m1!1s0x2e71220b291fa277:0x56057d7d4f06f570!6m8!1m7!1s2ojEInFwjsk_gIbIPeeWHw!2m2!1d-6.5203405!2d110.7086687!3f250.65!2f0!5f0.7820853872224151', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'announcement_bar_text'], ['value' => 'Selamat Datang di Website Resmi MI Darun Najah Jepara!', 'type' => 'text']);
        \App\Models\Setting::updateOrCreate(['key' => 'announcement_bar_active'], ['value' => '1', 'type' => 'boolean']);

        // Seed default teachers
        $t1 = \App\Models\Teacher::updateOrCreate(
            ['nip' => '198203152009121003'],
            [
                'name' => 'Ust. M. Ridwan, S.Pd.I.',
                'subject' => 'Al-Qur\'an Hadits',
                'photo_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC8fOzmS6ivMHlu865CSHFkYD0nrQPRGc_YnoUkLgFAywKyQI5NAlqYfcYY9yXG-us8yIgDwWVspNmkq5JswC3AbudTMMd3pfDq8JeQpHSqakCIbty5odMmSLQBOdlmaDKVYZierMQDN6VKMocKWVS_Yr5gx1dU6aXEsrnt0r1Atc8lv7RsmJM_aYsflnWZvQH1xhRnToa-hX5llHbsBuncZkM4AAMfpMl6ZTJ6hV2YtrpniS2S9DIr',
                'is_active' => true,
                'order' => 1,
            ]
        );
        
        \App\Models\Setting::updateOrCreate(['key' => 'teacher_of_the_month_id'], ['value' => $t1->id, 'type' => 'text']);

        \App\Models\Teacher::updateOrCreate(
            ['nip' => '198705242014082001'],
            [
                'name' => 'Ustz. Sarah Wijaya, S.Pd.',
                'subject' => 'Matematika',
                'photo_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCLy4Z0l3597cEw4yK-YisB1pW16xM82n3sI4H9zWpB9nK6GjR8lgC5nHcKVXZJ9dZ4tC4Xg3h6KqY78M6cK4Y4g3d8L0vC5nHcKVXZJ9dZ4tC4Xg3h6KqY78M6cK4Y4g3d8L0v',
                'is_active' => true,
                'order' => 2,
            ]
        );

        \App\Models\Teacher::updateOrCreate(
            ['nip' => '199011122018011002'],
            [
                'name' => 'Ust. Ahmad Fauzi, S.Ag.',
                'subject' => 'Bahasa Arab & Fiqih',
                'photo_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCLy4Z0l3597cEw4yK-YisB1pW16xM82n3sI4H9zWpB9nK6GjR8lgC5nHcKVXZJ9dZ4tC4Xg3h6KqY78M6cK4Y4g3d8L0vC5nHcKVXZJ9dZ4tC4Xg3h6KqY78M6cK4Y4g3d8L0v',
                'is_active' => true,
                'order' => 3,
            ]
        );

        \App\Models\Teacher::updateOrCreate(
            ['nip' => '199304022020102004'],
            [
                'name' => 'Ustz. Fatimah Azzahra, S.Pd.',
                'subject' => 'Bahasa Inggris',
                'photo_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCLy4Z0l3597cEw4yK-YisB1pW16xM82n3sI4H9zWpB9nK6GjR8lgC5nHcKVXZJ9dZ4tC4Xg3h6KqY78M6cK4Y4g3d8L0vC5nHcKVXZJ9dZ4tC4Xg3h6KqY78M6cK4Y4g3d8L0v',
                'is_active' => true,
                'order' => 4,
            ]
        );

        // Seed default achievements
        \App\Models\Achievement::updateOrCreate(
            ['title' => '1st Place National Science Olympiad'],
            [
                'category' => 'Academic',
                'rank' => '1st Place',
                'achiever_name' => 'Muhammad Raihan',
                'date' => '2024-05-15',
                'description' => 'Meraih medali emas tingkat nasional dalam ajang bergengsi Olimpiade Sains Nasional (OSN) 2024.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAUNQloOxTZKWLQkBqqUdo_IYewTbMKpPnkVSIOSE7r17BRF8lgKDn3UHe83lJkfXbvR6M3Xqstm5MCyXXj-mWIZWwU5LCacoqLyFdJDA4xkNWS1z7ZNpCn6PfNfvJmgr6Q5GKpfXNn8fV-prBLy2Sis8e9ZSNZII4_7vcjDI078C2vCr75bdK4CoG96KadD7vFwBXIDJwtqnO9IqWBkxb5vxI0ILuCBhb80oouSJdhD3ohzHUzPh2a',
            ]
        );

        \App\Models\Achievement::updateOrCreate(
            ['title' => 'Gold Medal Pencak Silat Championship'],
            [
                'category' => 'Sports',
                'rank' => 'Gold Medal',
                'achiever_name' => 'Siti Aminah',
                'date' => '2024-04-10',
                'description' => 'Juara 1 Kejuaraan Pencak Silat antar pelajar se-Jawa Timur.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBA3pucwOV22NLJ_tIqF2yxzFn89Vbd9AnfnodzT6sL0_uG2reVo5g3tfNRaSBmMHHpi6eRmt4OCPmz9OtwJlhA_L9b7OBQrjQBxhl_qTn6wsr5BN8jAi8rN2ExZGvG_3W9QDeESMuYw2rkZC97KJLL7E_7rDoi10o-uABKVke6ZOII9d_rcWmrLJmtvq5QnpK6MZBzIcxiZ8JWILQrWEoCHBvSZj_kYts8k910S7RWk0bXAUbZ4TOZ',
            ]
        );

        \App\Models\Achievement::updateOrCreate(
            ['title' => 'Province Level Calligraphy Winner'],
            [
                'category' => 'Religious',
                'rank' => '1st Place',
                'achiever_name' => 'Ahmad Fauzi',
                'date' => '2023-11-20',
                'description' => 'Juara umum kaligrafi kontemporer tingkat provinsi.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCu7YmwL4HPPNWkg08LHd9HPFgx0tLNwT99N7anLYElEbwkjjcTQQq5CJ3WvSGh19W9u50GPNyOTFAmBMr3o3KhKLWxNsAsYeku5ROhkPr5wn0qTvqBnSX4SY8YUsktGV1UxI_PAoEaGakSoyTVX3KImQ5qp8aMX5M-JFT6k06jd0pRmzhQV2NF1jE2uFfY4pj-SfokHfIN_amMLcadalgw4EIWlwARvBdh5StYrTZxxTk7XP76F7c0',
            ]
        );

        \App\Models\Achievement::updateOrCreate(
            ['title' => 'City-wide Choir Festival Runner Up'],
            [
                'category' => 'Art & Culture',
                'rank' => 'Runner Up',
                'achiever_name' => 'El-Najah Choir',
                'date' => '2023-09-05',
                'description' => 'Meraih juara 2 Festival Paduan Suara Pelajar tingkat kota.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB7wjC2S_VEJQ4E6r2QRuht0Xu-2clH3JR6v1HKtkD5bvwmgpmWZJ04cYQpYDrpIEjxYMyFfCx-MgWSzAGj06nv-D6XG4QmhCrxbw-7qHUaIy80tBqJAQvG8YEGoCZGTZmdiJiEPvt_HBQ6wHkIpnL8tbwa3vLeyTKvl8c8kobt6dNLIV3xHlA0SrUXrbc7VqpGSV8Zwyaiv0Rjdh3nS7zICcRjRM5hdd091_yllTYDf-08ASYJ_NfY',
            ]
        );

        // Seed default extracurriculars
        \App\Models\Extracurricular::updateOrCreate(
            ['slug' => 'pencak-silat'],
            [
                'name' => 'Pencak Silat',
                'description' => 'Kegiatan bela diri tradisional untuk melatih kedisiplinan dan fisik siswa.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC4RCCy7hsFiGgNdThrt6hes9Y1AL_1l3U76YDw-Dh1n8dfG7dkkWehRAOUYtUYumFfSDa-aK_SBCb5ogo7z3t_TlxosuUIvQTPKU170I2hkvV55q5bgsMaULVrAFDFtAagUWpWUMmWF6xeQNL4KV45zbu-P9c0D89CkkY0_YohvBNzJd2ScLyjoIR-gNYi49MByPN_XJI56IWS-tK8QXKBtxzvVI_Lt7YfmDASR_2vy9LL7rWAltAf',
                'coach_name' => 'Ahmad Fauzi',
                'schedule' => 'Mon & Wed, 15:30 - 17:00',
            ]
        );

        \App\Models\Extracurricular::updateOrCreate(
            ['slug' => 'robotics-club'],
            [
                'name' => 'Robotics Club',
                'description' => 'Klub robotik dan coding untuk melatih keterampilan teknologi, kreativitas, dan inovasi siswa.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDwR9wo1rxAfgvmi5jks1JOnW0XZYeqgV-sdsnA0zC7v2NrslNJpaSqYH3SLkdiSZ96E4XqkimnasznVyGkgG5pCoAJ0xCvSIppbyCCutarS-UFaAYPfSF0-Wn8nAvw8AdxHSg0K-OBmJEUaIpOcLyTH42w6UCoAGN_GOJBdroaydtoL6ceTGA1t5pCP0j6ETIVPV5fCHAO0CDe7X6iyyOG1QeT9ndJgTM4yHgXw_-Ecq2T9HjZ4bOB',
                'coach_name' => 'Sarah Wijaya',
                'schedule' => 'Tuesday, 14:00 - 16:00',
            ]
        );

        \App\Models\Extracurricular::updateOrCreate(
            ['slug' => 'tahfidz-quran'],
            [
                'name' => 'Tahfidz Quran',
                'description' => 'Program hafalan Al-Quran dengan bimbingan ustadz berpengalaman untuk mencetak generasi Qur\'ani.',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDga_9JnZq4pYTuVSdASUYsCYGwCqEvwnHiySb5N2Z2Smf4-NauiAQy4vJ1h389cL6qY1_IdRia3JJ6QzBDzfGFImwV-1N3pyeyY9crRMey7AjNTHYUPyC5nD4sN-uRBmYCH1vyqMllrC4RmcNSo91ef4qq6WMHHtjGu2MXrWXdis_JqbeLPLV1sq8ZMMXx9rA4vmBMLa5DpMiAQYUkd8vyX7I2yY5ThL--Fg6HaHbAhcz-OKjHcKYX',
                'coach_name' => 'M. Ridwan',
                'schedule' => 'Daily, 06:30 - 07:30',
            ]
        );

        // Seed default Events
        \App\Models\Event::updateOrCreate(
            ['title' => 'Wisuda & Haflah Akhirussanah'],
            [
                'slug' => 'wisuda-haflah-akhirussanah',
                'description' => 'Perayaan kelulusan siswa kelas VI angkatan 2023/2024 dan apresiasi prestasi siswa.',
                'event_date' => '2026-06-25 08:00:00',
                'location' => 'Aura Utama Kampus MI Darun Najah',
            ]
        );

        \App\Models\Event::updateOrCreate(
            ['title' => 'Pekan Olahraga & Seni (PORSENI)'],
            [
                'slug' => 'pekan-olahraga-seni-porseni',
                'description' => 'Kompetisi seni dan olahraga antar kelas untuk menyalurkan bakat siswa.',
                'event_date' => '2026-05-10 07:30:00',
                'location' => 'Lapangan Olahraga Utama',
            ]
        );

        // Seed default Hero Banners
        \App\Models\HeroBanner::updateOrCreate(
            ['title' => 'Excellent with Integral Character'],
            [
                'subtitle' => 'MI Darun Najah',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDWbZTaurlojAwQDmPxDOEWmpVtlIgn05Wxm3DrQLMiOy_s4bhCnMFCSsMyYeSD-s_IePdVKTeeXBhlnfF2FRZbAkKHbkkQAWAJNe3eb4U53nZnmdV4eY-cObLg8q_EG0PEAlnVlH3dXZok1s8fVbWgBdCPjbjFWPDb14F2V2xACpHejRcaoUwFigtGb6_XV7eltBSVSpUENju7ccOFzttbbH8m344xb_tPph3VUFOR1PA00kXCxcRZ',
                'button_text' => 'Mulai Jelajahi',
                'button_link' => '#sambutan',
                'order' => 1,
                'is_active' => true,
            ]
        );

        \App\Models\HeroBanner::updateOrCreate(
            ['title' => 'PPDB 2026/2027'],
            [
                'subtitle' => 'Melahirkan Generasi Qur\'ani',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDWbZTaurlojAwQDmPxDOEWmpVtlIgn05Wxm3DrQLMiOy_s4bhCnMFCSsMyYeSD-s_IePdVKTeeXBhlnfF2FRZbAkKHbkkQAWAJNe3eb4U53nZnmdV4eY-cObLg8q_EG0PEAlnVlH3dXZok1s8fVbWgBdCPjbjFWPDb14F2V2xACpHejRcaoUwFigtGb6_XV7eltBSVSpUENju7ccOFzttbbH8m344xb_tPph3VUFOR1PA00kXCxcRZ',
                'button_text' => 'Lihat sekarang',
                'button_link' => '#kontak',
                'order' => 2,
                'is_active' => true,
            ]
        );

        // Seed default Virtual Tour
        \App\Models\VirtualTour::updateOrCreate(
            ['name' => 'Masjid Kampus'],
            [
                'description' => 'Masjid Kampus MI Darun Najah, pusat kegiatan ibadah dan pembinaan karakter religius siswa.',
                'media_type' => '360_panorama',
                'image_paths' => ['https://lh3.googleusercontent.com/aida-public/AB6AXuBAjV146X1mPiaa2cM4xNq34l9yX1a7g6fD5e8lOq7r8dM9sPla2cM4xNq34l9yX1a7g6fD5e8lOq7r8dM9s'],
                'order' => 1,
                'is_active' => true,
            ]
        );

        // Seed default Faqs
        \App\Models\Faq::updateOrCreate(
            ['question' => 'Bagaimana prosedur pendaftaran murid baru?'],
            [
                'answer' => 'Pendaftaran murid baru dapat dilakukan secara online melalui link PPDB di homepage, atau langsung datang ke sekretariat pendaftaran di MI Darun Najah.',
                'order' => 1,
                'is_active' => true,
            ]
        );

        \App\Models\Faq::updateOrCreate(
            ['question' => 'Apa saja program ekstrakurikuler yang tersedia?'],
            [
                'answer' => 'Tersedia berbagai program unggulan seperti Pramuka, Tahfidz Al-Quran, Robotics Club, Pencak Silat, Paduan Suara, Kaligrafi, dan klub sains.',
                'order' => 2,
                'is_active' => true,
            ]
        );

        \App\Models\Faq::updateOrCreate(
            ['question' => 'Seberapa banyak presentase siswa yang mendaftar ulang setiap tahunnya?'],
            [
                'answer' => 'Sebanyak 95% siswa yang telah lulus dari madrasah ini melanjutkan pendidikan di sekolah menengah atau institusi pendidikan tinggi yang relevan.',
                'order' => 3,
                'is_active' => true,
            ]
        );

        // Seed default Announcements
        \App\Models\Announcement::updateOrCreate(
            ['slug' => 'delegasi-robotik-mi-darun-najah-raih-emas'],
            [
                'title' => 'Delegasi Robotik MI Darun Najah Raih Emas di Kompetisi Regional',
                'category' => 'Prestasi',
                'content' => 'Tim robotik madrasah berhasil menunjukkan keunggulan teknologi dalam ajang tahunan yang diikuti oleh puluhan sekolah regional.',
                'read_time' => 3,
                'image_path' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb?auto=format&fit=crop&q=80&w=800',
                'is_active' => true,
                'published_at' => now(),
            ]
        );

        \App\Models\Announcement::updateOrCreate(
            ['slug' => 'jadwal-ujian-akhir-semester-genap'],
            [
                'title' => 'Jadwal Ujian Akhir Semester Genap TA 2023/2024',
                'category' => 'Pengumuman',
                'content' => 'Pihak madrasah telah merilis kalender akademik terbaru terkait pelaksanaan evaluasi akhir tahun bagi seluruh siswa.',
                'read_time' => 2,
                'image_path' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?auto=format&fit=crop&q=80&w=800',
                'is_active' => true,
                'published_at' => now(),
            ]
        );

        \App\Models\Announcement::updateOrCreate(
            ['slug' => 'peresmian-laboratorium-sains-terintegrasi-baru'],
            [
                'title' => 'Peresmian Laboratorium Sains Terintegrasi Baru',
                'category' => 'Fasilitas',
                'content' => 'Fasilitas pendukung pembelajaran sains resmi beroperasi guna menunjang kurikulum berbasis riset dan eksperimen bagi siswa.',
                'read_time' => 4,
                'image_path' => 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?auto=format&fit=crop&q=80&w=800',
                'is_active' => true,
                'published_at' => now(),
            ]
        );

        // Check if admin user exists, if not create one
        \App\Models\User::updateOrCreate(
            ['email' => 'midarunnajahjepara@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => 'adminpassword123',
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'lyounaaroueess@gmail.com'],
            [
                'name' => 'Lya (Admin)',
                'password' => 'TehSisriGulaBatu',
            ]
        );
    }
}
