<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $settings['school_name'] }} - Unggul &amp; Qur'ani</title>
    <link rel="icon" type="image/png" href="/favicon.png"/>
    <link rel="shortcut icon" href="/favicon.png"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-error": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-tertiary-fixed": "#00210c",
                    "outline-variant": "#bec9c8",
                    "secondary-container": "#fed65b",
                    "on-background": "#191c1d",
                    "surface": "#f8f9fa",
                    "surface-container-highest": "#e1e3e4",
                    "secondary-fixed-dim": "#e9c349",
                    "on-secondary-fixed": "#241a00",
                    "secondary-fixed": "#ffe088",
                    "surface-tint": "#096969",
                    "on-tertiary-container": "#5aef8f",
                    "on-secondary-fixed-variant": "#574500",
                    "inverse-surface": "#2e3132",
                    "on-surface-variant": "#3f4948",
                    "surface-container-low": "#f3f4f5",
                    "primary-container": "#006666",
                    "on-tertiary-fixed-variant": "#005228",
                    "surface-dim": "#d9dadb",
                    "background": "#f8f9fa",
                    "on-background-variant": "#2e3132",
                    "tertiary-fixed": "#6bfe9c",
                    "primary-fixed-dim": "#86d4d3",
                    "outline": "#6f7979",
                    "surface-container-high": "#e7e8e9",
                    "error-container": "#ffdad6",
                    "primary": "#004c4c",
                    "surface-bright": "#f8f9fa",
                    "surface-container-lowest": "#ffffff",
                    "on-secondary": "#ffffff",
                    "primary-fixed": "#a2f0ef",
                    "on-primary": "#ffffff",
                    "tertiary": "#004f26",
                    "inverse-on-surface": "#f0f1f2",
                    "error": "#ba1a1a",
                    "on-primary-fixed-variant": "#004f4f",
                    "on-primary-fixed": "#002020",
                    "on-secondary-container": "#745c00",
                    "secondary": "#735c00",
                    "tertiary-container": "#006a35",
                    "on-error-container": "#93000a",
                    "tertiary-fixed-dim": "#4ae183",
                    "on-surface": "#191c1d",
                    "inverse-primary": "#86d4d3",
                    "on-primary-container": "#93e1e0",
                    "surface-variant": "#e1e3e4",
                    "surface-container": "#edeeef"
            },
            "borderRadius": {
                    "DEFAULT": "0.5rem",
                    "lg": "0.5rem",
                    "xl": "0.5rem",
                    "full": "9999px"
            },
            "maxWidth": {
                    "container-max": "1200px"
            },
            "spacing": {
                    "section-gap": "80px",
                    "margin-desktop": "40px",
                    "gutter": "24px",
                    "margin-mobile": "16px",
                    "base": "8px"
            },
            "fontFamily": {
                    "headline-lg-mobile": ["Manrope"],
                    "label-md": ["Work Sans"],
                    "label-sm": ["Work Sans"],
                    "display-lg": ["Manrope"],
                    "headline-lg": ["Manrope"],
                    "headline-md": ["Manrope"],
                    "body-lg": ["Work Sans"],
                    "body-md": ["Work Sans"]
            },
            "fontSize": {
                    "headline-lg-mobile": ["28px", {"lineHeight": "1.3", "fontWeight": "700"}],
                    "label-md": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "1.2", "fontWeight": "500"}],
                    "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .animate-scroll {
            animation: scroll 30s linear infinite;
        }
        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">

<!-- Sticky Top Header Container -->
<div class="sticky top-0 z-50 w-full shadow-sm">
    <!-- Running Announcement Bar -->
    @if ($settings['announcement_bar_active'] && !empty($settings['announcement_bar_text']))
    <div class="bg-primary text-on-primary py-2 overflow-hidden whitespace-nowrap">
        <div class="animate-scroll inline-block font-label-md">
            @if (!empty($settings['announcement_bar_link']))
                <a href="{{ $settings['announcement_bar_link'] }}" target="_blank" class="hover:underline">{{ $settings['announcement_bar_text'] }}</a>
            @else
                {{ $settings['announcement_bar_text'] }}
            @endif
        </div>
    </div>
    @endif

    <!-- Top Navigation Header -->
    <header class="bg-surface border-b border-outline-variant">
        <div class="flex justify-between items-center h-20 px-margin-desktop max-w-container-max mx-auto">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white rounded-full overflow-hidden flex-shrink-0 border border-outline-variant/40 shadow-sm p-1.5">
                    <img src="/images/logo.png" alt="MI Darun Najah" class="w-full h-full object-contain"/>
                </div>
                <div>
                    <h1 class="font-headline-md text-headline-md font-bold text-primary">{{ $settings['school_name'] }}</h1>
                    <p class="font-label-sm text-label-sm text-on-surface-variant tracking-wider uppercase">Cerdas Terampil Berakhlaq Mulia</p>
                </div>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1 font-bold" href="#">Home</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#sambutan">Profile</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#program">Program</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#warta">Information</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#kontak">Contact</a>
            </nav>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full cursor-pointer transition-all">public</span>
                <a href="/login" class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-all" title="Portal Admin">person</a>
            </div>
        </div>
    </header>
</div>

<!-- Hero Banner Section -->
@php
    $banner = $banners->first();
    if ($banner && !empty($banner->image_path)) {
        $heroImage = filter_var($banner->image_path, FILTER_VALIDATE_URL)
            ? $banner->image_path
            : (Str::startsWith($banner->image_path, ['/storage', 'storage']) ? asset($banner->image_path) : asset('storage/' . $banner->image_path));
    } else {
        $heroImage = !empty($settings['school_cover_image']) 
            ? (filter_var($settings['school_cover_image'], FILTER_VALIDATE_URL) ? $settings['school_cover_image'] : (Str::startsWith($settings['school_cover_image'], ['/storage', 'storage']) ? asset($settings['school_cover_image']) : asset('storage/' . $settings['school_cover_image'])))
            : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBSQo-1h-JJI1nVRF8kRdlpd1RYk1ivjcP4AOqh9Vl38vjbHfQi6Hy3nFw5sCx4dg6y6qR_lS3lg-01Iy3EoxRZg-X-yrD6_nE0Wp9DF5mGeM0RsEC8Zm3RBlt0C1eDbA03PcAbo3XVPo3tiMfYe0uSULnS7o1IwaypuHQgM1nWTcF5A2WB-xKOZoxUnH6ugrjB-c-g0xoIbUFYqZrrfyp3gR9uijR_NIWNSBK2ljOFBOWHvXyZi_ot';
    }
@endphp
<section class="relative h-[650px] md:h-[750px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ $heroImage }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/70 to-transparent"></div>
    </div>
    <div class="relative z-10 px-margin-desktop max-w-container-max mx-auto w-full">
        <div class="text-on-primary space-y-6 max-w-2xl text-white">
            <span class="inline-block px-4 py-1.5 rounded-full border border-primary-fixed text-primary-fixed font-label-md">PPDB TAHUN AJARAN BARU - MENDATANG</span>
            <h2 class="font-display-lg text-display-lg leading-tight">{{ $banner->subtitle ?? 'Melahirkan Generasi Qur\'ani yang Unggul & Berkarakter' }}</h2>
            <p class="font-body-lg text-body-lg text-on-primary/90">
                Excellent with Integral Character. Membentuk generasi yang cerdas secara akademik dan kokoh secara spiritual melalui pendidikan terpadu di {{ $settings['school_name'] }}.
            </p>
            <div class="flex flex-wrap gap-4 pt-2">
                <a href="#kontak" class="bg-secondary-container text-on-secondary-container px-8 py-3.5 rounded-lg font-bold hover:scale-105 transition-transform flex items-center gap-2">
                    Lihat Sekarang <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
                <a href="#sambutan" class="border border-on-primary text-on-primary px-8 py-3.5 rounded-lg font-bold hover:bg-on-primary/10 transition-colors">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Accreditation & Identity Section -->
<section class="py-12 bg-surface -mt-16 relative z-20">
    <div class="px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm border border-outline-variant flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center text-on-primary-container shrink-0">
                <span class="material-symbols-outlined text-2xl">verified</span>
            </div>
            <div>
                <h4 class="font-bold text-primary font-headline-sm">Akreditasi A</h4>
                <p class="text-sm text-on-surface-variant">Unggul (BAN-S/M)</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm border border-outline-variant flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-secondary-container rounded-full flex items-center justify-center text-on-secondary-container shrink-0">
                <span class="material-symbols-outlined text-2xl">lightbulb</span>
            </div>
            <div>
                <h4 class="font-bold text-primary font-headline-sm">Smart Religious School</h4>
                <p class="text-sm text-on-surface-variant">Pendidikan Berbasis Teknologi</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm border border-outline-variant flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 bg-tertiary-container rounded-full flex items-center justify-center text-on-tertiary-container shrink-0">
                <span class="material-symbols-outlined text-2xl">menu_book</span>
            </div>
            <div>
                <h4 class="font-bold text-primary font-headline-sm">Islamic Character</h4>
                <p class="text-sm text-on-surface-variant">Pendidikan Karakter Qur'ani</p>
            </div>
        </div>
    </div>
</section>

<!-- Achievement Counter -->
<section class="bg-primary-container text-on-primary-container py-16">
    <div class="px-margin-desktop max-w-container-max mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter text-center">
            <div class="space-y-2">
                <span class="font-display-lg text-display-lg block font-bold text-on-primary-container">{{ $teachers->count() }}</span>
                <p class="font-label-md text-label-md opacity-80 uppercase tracking-widest">Tenaga Pengajar</p>
            </div>
            <div class="space-y-2">
                <span class="font-display-lg text-display-lg block font-bold text-on-primary-container">850+</span>
                <p class="font-label-md text-label-md opacity-80 uppercase tracking-widest">Siswa Aktif</p>
            </div>
            <div class="space-y-2">
                <span class="font-display-lg text-display-lg block font-bold text-on-primary-container">120+</span>
                <p class="font-label-md text-label-md opacity-80 uppercase tracking-widest">Prestasi Nasional</p>
            </div>
            <div class="space-y-2">
                <span class="font-display-lg text-display-lg block font-bold text-on-primary-container">24</span>
                <p class="font-label-md text-label-md opacity-80 uppercase tracking-widest">Ruang Kelas</p>
            </div>
        </div>
    </div>
</section>

<!-- School Introduction & Principal's Welcome -->
<section id="sambutan" class="py-section-gap px-margin-desktop max-w-container-max mx-auto grid md:grid-cols-12 gap-12 items-center">
    <div class="md:col-span-5 relative">
        <div class="aspect-[3/4] rounded-lg overflow-hidden shadow-xl bg-surface-container-low">
            @if (!empty($settings['headmaster_photo']))
                <img class="w-full h-full object-cover" src="{{ filter_var($settings['headmaster_photo'], FILTER_VALIDATE_URL) ? $settings['headmaster_photo'] : (Str::startsWith($settings['headmaster_photo'], ['/storage', 'storage']) ? asset($settings['headmaster_photo']) : asset('storage/' . $settings['headmaster_photo'])) }}"/>
            @else
                <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-iJ913cEi8hx22nInx5-4zR5WXOPADgOmW8YKxREJQx4iDze8fNm2x2kTjuuBO8F-Piy8dObi_zEOvquoUSH9g25PGTWl28LBHK0xut6gHwrQ2-wCxlsRBmcXFe4dUOJ5s-JHNVTFTqJKfhCGagFTc5g23Rrrkl5mIwxoJWh01YJDjZDwK0aUjMKtiPL1utb_YO9RzQZoASFfP5A8XhCmuAVRBRw-XPrTHBZfXOCUxDKtHD8GOnUf"/>
            @endif
        </div>
        <div class="absolute -bottom-6 -right-6 bg-secondary-fixed text-on-secondary-fixed p-6 rounded-lg shadow-lg max-w-[240px]">
            <p class="font-label-md italic mb-2">"{{ $settings['headmaster_quote'] ?? 'Mendidik dengan hati, membimbing dengan Al-Qur\'an.' }}"</p>
            <p class="font-bold">{{ $settings['headmaster_name'] ?? 'Ust. Ahmad Fauzi, M.Pd' }}</p>
            <p class="text-sm opacity-75">Kepala Sekolah {{ $settings['school_name'] }}</p>
        </div>
    </div>
    <div class="md:col-span-7 space-y-6">
        <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Selamat Datang di {{ $settings['school_name'] }}</h3>
        <div class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed text-justify space-y-4">
            {!! $settings['headmaster_greeting'] ?? 'Selamat Datang di Portal Resmi MI Darun Najah.' !!}
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section id="visimisi" class="py-12 bg-surface-container-lowest border-y border-outline-variant">
    <div class="px-margin-desktop max-w-container-max mx-auto grid md:grid-cols-2 gap-12">
        <div class="bg-surface p-8 rounded-lg border border-outline-variant relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <svg class="w-32 h-32" fill="currentColor" viewbox="0 0 100 100"><path d="M50 0L61.8034 38.1966H100L69.0983 60.6558L80.9017 98.8525L50 76.3934L19.0983 98.8525L30.9017 60.6558L0 38.1966H38.1966L50 0Z"></path></svg>
            </div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-primary-container text-on-primary-container rounded-lg flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-3xl">visibility</span>
                </div>
                <h3 class="font-headline-md text-primary mb-4 font-bold">Visi Kami</h3>
                <p class="text-on-surface-variant leading-relaxed">
                    {{ $settings['school_vision'] ?? 'Terwujudnya generasi Islam yang cerdas, terampil, berakhlaq mulia, dan berwawasan lingkungan berlandaskan Al-Qur\'an dan As-Sunnah.' }}
                </p>
            </div>
        </div>
        <div class="bg-surface p-8 rounded-lg border border-outline-variant relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <svg class="w-32 h-32" fill="currentColor" viewbox="0 0 100 100"><path d="M50 0L61.8034 38.1966H100L69.0983 60.6558L80.9017 98.8525L50 76.3934L19.0983 98.8525L30.9017 60.6558L0 38.1966H38.1966L50 0Z"></path></svg>
            </div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-secondary-container text-on-secondary-container rounded-lg flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-3xl">track_changes</span>
                </div>
                <h3 class="font-headline-md text-primary mb-4 font-bold">Misi Kami</h3>
                <div class="text-on-surface-variant leading-relaxed space-y-2">
                    @if (!empty($settings['school_mission']))
                        {!! $settings['school_mission'] !!}
                    @else
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary mt-1 text-sm">check_circle</span>
                                <span>Menyelenggarakan pendidikan dasar Islam yang terpadu dan bermutu.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary mt-1 text-sm">check_circle</span>
                                <span>Membentuk karakter siswa yang tangguh dan Islami.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary mt-1 text-sm">check_circle</span>
                                <span>Mengembangkan potensi kecerdasan majemuk peserta didik.</span>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- School Programs -->
<section id="program" class="py-section-gap px-margin-desktop max-w-container-max mx-auto">
    <div class="text-center mb-12">
        <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Program Kelas</h3>
        <p class="text-on-surface-variant">Pilihan program pendidikan yang disesuaikan dengan kebutuhan belajar siswa.</p>
        <div class="mt-3">
            <span class="text-xs text-primary font-semibold bg-primary-container/20 px-3.5 py-1.5 rounded-full inline-flex items-center gap-1.5 border border-primary-container/40">
                <span class="material-symbols-outlined text-sm">info</span>
                <span>Program kelas dipilih calon siswa saat proses Pendaftaran Siswa Baru (PPDB)</span>
            </span>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-surface rounded-lg p-8 border border-outline-variant hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between">
            <div>
                <h4 class="font-bold text-primary font-headline-md mb-2">Kelas Reguler</h4>
                <p class="text-on-surface-variant text-sm mb-6">Program pendidikan standar dengan kurikulum nasional dan muatan lokal keislaman.</p>
                <ul class="space-y-2 mb-8 text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Kurikulum Merdeka</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Tahfidz 1 Juz</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Ekstrakurikuler Wajib</li>
                </ul>
            </div>
            <a href="#kontak" class="w-full text-center border border-primary text-primary py-2.5 rounded-lg font-bold hover:bg-primary-container hover:text-white transition-colors block">Detail Kurikulum</a>
        </div>
        <div class="bg-primary text-on-primary rounded-lg p-8 shadow-lg relative transform scale-105 z-10 flex flex-col justify-between text-white">
            <div class="absolute top-0 right-0 bg-secondary-fixed text-on-secondary-fixed text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">POPULER</div>
            <div>
                <h4 class="font-bold font-headline-md mb-2 text-white text-xl">Kelas Reguler Plus</h4>
                <p class="text-on-primary/80 text-sm mb-6">Program intensif dengan penambahan jam belajar untuk tahfidz dan bahasa asing.</p>
                <ul class="space-y-2 mb-8 text-sm opacity-90">
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary-fixed text-sm">done</span> Kurikulum Merdeka Plus</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary-fixed text-sm">done</span> Tahfidz 3 Juz</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary-fixed text-sm">done</span> English &amp; Arabic Club</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary-fixed text-sm">done</span> Program Pengembangan Diri</li>
                </ul>
            </div>
            <a href="#kontak" class="w-full text-center bg-secondary-container text-on-secondary-container py-2.5 rounded-lg font-bold hover:opacity-90 transition-opacity block">Detail Kurikulum</a>
        </div>
        <div class="bg-surface rounded-lg p-8 border border-outline-variant hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between">
            <div>
                <h4 class="font-bold text-primary font-headline-md mb-2">Full Day Class</h4>
                <p class="text-on-surface-variant text-sm mb-6">Program pendidikan menyeluruh hingga sore hari dengan pengayaan khusus.</p>
                <ul class="space-y-2 mb-8 text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Pembelajaran Terpadu</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Tahfidz 5 Juz</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Katering Makan Siang</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">done</span> Bimbingan Belajar Khusus</li>
                </ul>
            </div>
            <a href="#kontak" class="w-full text-center border border-primary text-primary py-2.5 rounded-lg font-bold hover:bg-primary-container hover:text-white transition-colors block">Detail Kurikulum</a>
        </div>
    </div>

    <!-- PPDB Call to Action Banner -->
    <div class="mt-12 bg-surface-container-low p-6 md:p-8 rounded-xl border border-outline-variant flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
        <div class="text-left space-y-1">
            <h4 class="font-bold text-primary text-lg">Tertarik Mendaftarkan Putra/Putri Anda di MI Darun Najah?</h4>
            <p class="text-sm text-on-surface-variant">Pendaftaran murid baru (PPDB) dapat dilakukan dengan menghubungi panitia pendaftaran kami.</p>
        </div>
        <a href="#kontak" class="bg-primary text-on-primary px-6 py-3 rounded-lg font-bold hover:bg-primary/90 transition-all flex-shrink-0 flex items-center gap-2 shadow-sm">
            <span class="material-symbols-outlined text-sm">assignment_add</span>
            <span>Info &amp; Pendaftaran PPDB</span>
        </a>
    </div>
</section>

<!-- Featured Programs (Dynamic Extracurriculars) -->
@if ($extracurriculars->isNotEmpty())
<section class="py-section-gap bg-surface-container-lowest">
    <div class="px-margin-desktop max-w-container-max mx-auto">
        <div class="text-center mb-12">
            <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Jelajahi Program Ekstrakurikuler Kami</h3>
            <p class="text-on-surface-variant">Inovasi bakat dan minat untuk melatih fisik serta kreativitas anak didik.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($extracurriculars->take(6) as $extra)
                <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden hover:shadow-md transition-shadow group flex flex-col justify-between">
                    <div class="h-48 bg-cover bg-center bg-surface-variant relative overflow-hidden" style="background-image: url('{{ filter_var($extra->image_path, FILTER_VALIDATE_URL) ? $extra->image_path : (Str::startsWith($extra->image_path, ['/storage', 'storage']) ? asset($extra->image_path) : asset('storage/' . $extra->image_path)) }}')">
                        <span class="absolute top-4 left-4 bg-primary text-on-primary text-xs font-bold px-3 py-1 rounded-full z-10">{{ $extra->category }}</span>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent z-0"></div>
                        <h4 class="absolute bottom-4 left-4 font-bold text-white text-lg z-10 leading-snug">{{ $extra->name }}</h4>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between gap-4">
                        <!-- Coach Info -->
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full border-2 border-primary-fixed overflow-hidden bg-surface-container-high flex-shrink-0">
                                @if($extra->coach_photo_path)
                                    <img class="w-full h-full object-cover" src="{{ filter_var($extra->coach_photo_path, FILTER_VALIDATE_URL) ? $extra->coach_photo_path : (Str::startsWith($extra->coach_photo_path, ['/storage', 'storage']) ? asset($extra->coach_photo_path) : asset('storage/' . $extra->coach_photo_path)) }}">
                                @else
                                    <div class="w-full h-full bg-secondary-container/30 flex items-center justify-center text-secondary font-bold text-sm">
                                        {{ substr($extra->coach_name ?? 'C', 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-primary leading-tight">{{ $extra->coach_name ?? 'No Coach assigned' }}</p>
                                <p class="text-xs text-on-surface-variant">{{ $extra->coach_role ?? 'Instructor' }}</p>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="text-sm text-on-surface-variant line-clamp-3">{{ $extra->description }}</p>

                        <!-- Schedule & Location -->
                        <div class="border-t border-outline-variant/60 pt-4 text-xs text-on-surface-variant space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-primary">schedule</span>
                                <span>Jadwal: {{ $extra->schedule }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-primary">location_on</span>
                                <span>Lokasi: {{ $extra->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Teacher Showcase (Automatic rotating quotes + thumbnails) -->
@if ($teachers->isNotEmpty())
<section id="teachers" class="py-section-gap px-margin-desktop max-w-container-max mx-auto">
    <div class="flex justify-between items-end mb-12">
        <div>
            <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Tim Pendidik &amp; Inspirator</h3>
            <p class="text-on-surface-variant">Pendidik profesional yang berdedikasi membimbing dengan Al-Qur'an.</p>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row gap-8 items-center bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm relative">
        <!-- Main Quote Display Card -->
        <div class="w-full lg:w-1/2 relative h-[380px] rounded-xl overflow-hidden bg-primary-container text-white flex flex-col justify-end p-8" id="teacher-showcase-card">
            <div class="absolute inset-0 z-0 bg-cover bg-center transition-all duration-500 brightness-50" id="showcase-img"></div>
            <div class="relative z-10 space-y-2">
                <div class="flex gap-2">
                    <span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed rounded-md text-xs font-bold tracking-wider" id="showcase-role">Guru</span>
                    <span class="inline-block px-3 py-1 bg-white/20 border border-white/25 rounded-md text-xs font-bold tracking-wider" id="showcase-subject">Guru Kelas &amp; Tahfidz</span>
                </div>
                <h4 class="font-headline-md font-bold text-2xl" id="showcase-name">Ust. Abdullah, S.Pd</h4>
                <blockquote class="text-base italic opacity-95 leading-relaxed pt-2" id="showcase-quote">
                    "Pendidikan sejati bukan hanya mentransfer ilmu, tapi menumbuhkan akhlaq mulia dalam setiap jiwa siswa."
                </blockquote>
                <div class="pt-4">
                    <a href="#" id="showcase-link" class="text-secondary-fixed font-bold text-sm inline-flex items-center gap-1 hover:underline">
                        Lihat Profil Lengkap <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Thumbnails and Selection -->
        <div class="w-full lg:w-1/2 space-y-4">
            <h5 class="font-bold text-primary text-sm uppercase tracking-wider">Pilih Guru &amp; Quotes</h5>
            <div class="grid grid-cols-3 sm:grid-cols-4 gap-4">
                @foreach ($teachers as $idx => $t)
                    <div class="w-full aspect-square rounded-lg overflow-hidden border-2 cursor-pointer transition-all duration-300 hover:scale-105 group select-none relative {{ $idx === 0 ? 'border-primary' : 'border-transparent opacity-70 hover:opacity-100' }}" 
                         onclick="selectShowcaseTeacher({{ $idx }})" 
                         id="thumb-{{ $idx }}"
                         data-name="{{ $t->name }}"
                         data-role="{{ $t->role ?? 'Guru' }}"
                         data-subject="{{ $t->subject }}"
                         data-photo="{{ $t->photo_path ? (filter_var($t->photo_path, FILTER_VALIDATE_URL) ? $t->photo_path : asset('storage/' . $t->photo_path)) : 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&q=80&w=200' }}"
                         data-quote="{{ $t->quote ?? 'Mari membimbing anak didik dengan cinta dan berpegang teguh pada Al-Qur\'an.' }}"
                         data-url="/teachers/{{ $t->id }}">
                        <img class="w-full h-full object-cover" src="{{ $t->photo_path ? (filter_var($t->photo_path, FILTER_VALIDATE_URL) ? $t->photo_path : asset('storage/' . $t->photo_path)) : 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&q=80&w=200' }}" alt="{{ $t->name }}">
                        @if (($t->role ?? 'Guru') !== 'Guru')
                            <span class="absolute bottom-1 right-1 bg-secondary text-on-secondary text-[8px] font-bold px-1.5 py-0.5 rounded shadow-sm">{{ $t->role }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    // Teacher Showcase Quotes Slideshow Logic
    let currentShowcaseIdx = 0;
    const teachersListLength = {{ $teachers->count() }};
    let showcaseInterval;

    function selectShowcaseTeacher(idx) {
        currentShowcaseIdx = idx;
        const thumb = document.getElementById(`thumb-${idx}`);
        if (!thumb) return;

        // Reset borders
        for (let i = 0; i < teachersListLength; i++) {
            const el = document.getElementById(`thumb-${i}`);
            if (el) {
                el.classList.remove('border-primary');
                el.classList.add('border-transparent', 'opacity-70');
            }
        }

        thumb.classList.add('border-primary');
        thumb.classList.remove('border-transparent', 'opacity-70');

        // Update main showcase card content
        const name = thumb.getAttribute('data-name');
        const role = thumb.getAttribute('data-role');
        const subject = thumb.getAttribute('data-subject');
        const photo = thumb.getAttribute('data-photo');
        const quote = thumb.getAttribute('data-quote');
        const url = thumb.getAttribute('data-url');

        document.getElementById('showcase-name').textContent = name;
        document.getElementById('showcase-role').textContent = role || 'Guru';
        document.getElementById('showcase-subject').textContent = subject;
        document.getElementById('showcase-quote').textContent = `"${quote}"`;
        document.getElementById('showcase-img').style.backgroundImage = `url('${photo}')`;
        document.getElementById('showcase-link').setAttribute('href', url);
    }

    function autoCycleShowcase() {
        if (teachersListLength === 0) return;
        currentShowcaseIdx = (currentShowcaseIdx + 1) % teachersListLength;
        selectShowcaseTeacher(currentShowcaseIdx);
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (teachersListLength > 0) {
            selectShowcaseTeacher(0);
            showcaseInterval = setInterval(autoCycleShowcase, 4000); // changes every 4 seconds
        }
    });
</script>
@endif

<!-- Upcoming Events & Countdown -->
@if ($featuredEvent)
@php
    $eventBgUrl = $featuredEvent->image_path ? (filter_var($featuredEvent->image_path, FILTER_VALIDATE_URL) ? $featuredEvent->image_path : (Str::startsWith($featuredEvent->image_path, ['/storage', 'storage']) ? asset($featuredEvent->image_path) : asset('storage/' . $featuredEvent->image_path))) : null;
@endphp
<section class="py-section-gap bg-primary text-on-primary text-white relative overflow-hidden bg-cover bg-center"
         @if($eventBgUrl) style="background-image: url('{{ $eventBgUrl }}')" @endif>
    @if($eventBgUrl)
        <div class="absolute inset-0 bg-black/60 z-0"></div>
    @endif
    <div class="relative z-10 px-margin-desktop max-w-container-max mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="max-w-md text-center md:text-left">
            <h3 class="font-headline-lg text-headline-lg mb-4 font-bold text-white text-3xl">Agenda Terdekat</h3>
            <p class="opacity-80">Persiapkan diri Anda untuk kegiatan besar madrasah yang akan datang.</p>
        </div>
        <div class="flex-1 max-w-2xl bg-white/10 p-8 rounded-lg backdrop-blur-md border border-white/20">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed text-xs font-bold rounded-lg mb-3">Kegiatan</span>
                    <h4 class="font-bold text-xl mb-1 text-white">{{ $featuredEvent->title }}</h4>
                    <div class="text-sm opacity-90 space-y-1">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">calendar_today</span> {{ \Carbon\Carbon::parse($featuredEvent->event_date)->translatedFormat('d F Y, H:i') }} WIB</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> {{ $featuredEvent->location }}</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4" id="countdown-timer" data-date="{{ $featuredEvent->event_date }}">
                <div class="bg-white text-primary p-4 rounded-lg text-center shadow-md">
                    <span class="block text-3xl font-extrabold" id="days-val">00</span>
                    <span class="text-xs uppercase font-bold">Hari</span>
                </div>
                <div class="bg-white text-primary p-4 rounded-lg text-center shadow-md">
                    <span class="block text-3xl font-extrabold" id="hours-val">00</span>
                    <span class="text-xs uppercase font-bold">Jam</span>
                </div>
                <div class="bg-white text-primary p-4 rounded-lg text-center shadow-md">
                    <span class="block text-3xl font-extrabold" id="minutes-val">00</span>
                    <span class="text-xs uppercase font-bold">Menit</span>
                </div>
                <div class="bg-white text-primary p-4 rounded-lg text-center shadow-md">
                    <span class="block text-3xl font-extrabold" id="seconds-val">00</span>
                    <span class="text-xs uppercase font-bold">Detik</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const timerContainer = document.getElementById('countdown-timer');
        if (!timerContainer) return;

        const targetDate = new Date(timerContainer.getAttribute('data-date')).getTime();

        const updateTimer = () => {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                document.getElementById('days-val').textContent = '00';
                document.getElementById('hours-val').textContent = '00';
                document.getElementById('minutes-val').textContent = '00';
                document.getElementById('seconds-val').textContent = '00';
                clearInterval(interval);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days-val').textContent = days < 10 ? '0' + days : days;
            document.getElementById('hours-val').textContent = hours < 10 ? '0' + hours : hours;
            document.getElementById('minutes-val').textContent = minutes < 10 ? '0' + minutes : minutes;
            document.getElementById('seconds-val').textContent = seconds < 10 ? '0' + seconds : seconds;
        };

        updateTimer();
        const interval = setInterval(updateTimer, 1000);
    });
</script>
@endif

<!-- Latest News & Announcements (Warta) -->
@if ($announcements->isNotEmpty())
<section id="warta" class="py-section-gap px-margin-desktop max-w-container-max mx-auto">
    <div class="flex justify-between items-end mb-12">
        <div>
            <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Warta &amp; Pengumuman</h3>
            <p class="text-on-surface-variant">Informasi terkini seputar kegiatan dan perkembangan madrasah.</p>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($announcements as $ann)
            @php
                $imageUrl = $ann->image_path ? (filter_var($ann->image_path, FILTER_VALIDATE_URL) ? $ann->image_path : (Str::startsWith($ann->image_path, ['/storage', 'storage']) ? asset($ann->image_path) : asset('storage/' . $ann->image_path))) : 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&q=80&w=800';
                $attachmentUrl = $ann->attachment_path ? (filter_var($ann->attachment_path, FILTER_VALIDATE_URL) ? $ann->attachment_path : asset('storage/' . $ann->attachment_path)) : null;
                $formattedDate = \Carbon\Carbon::parse($ann->published_at)->translatedFormat('d M Y');
                $jsContent = json_encode($ann->content);
            @endphp
            <div class="bg-surface rounded-lg overflow-hidden border border-outline-variant hover:shadow-lg transition-shadow group flex flex-col justify-between">
                <!-- Banner Image with Category Badge -->
                <div class="relative aspect-[16/9] w-full bg-surface-container-low overflow-hidden">
                    <img src="{{ $imageUrl }}" alt="{{ $ann->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed text-xs font-bold rounded-md shadow-sm">
                        {{ $ann->category ?? 'Pengumuman' }}
                    </span>
                </div>

                <!-- Card Content -->
                <div class="p-6 space-y-3 flex-grow flex flex-col justify-between">
                    <div>
                        <!-- Date -->
                        <div class="flex items-center text-[11px] font-bold text-on-surface-variant/80 uppercase tracking-wide mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">calendar_month</span> 
                                {{ $formattedDate }}
                            </span>
                        </div>
                        
                        <!-- Title -->
                        <h4 class="font-bold text-lg leading-snug text-on-surface hover:text-primary transition-colors line-clamp-2 cursor-pointer" onclick="openAnnouncementModal('{{ addslashes($ann->title) }}', '{{ $ann->category ?? 'Pengumuman' }}', '{{ $formattedDate }}', {!! $jsContent !!}, '{{ $imageUrl }}')">
                            {{ $ann->title }}
                        </h4>
                        
                        <!-- Description -->
                        <div class="text-on-surface-variant text-sm line-clamp-3 mt-2">
                            {!! strip_tags($ann->content) !!}
                        </div>
                    </div>

                    <!-- Links (Read More) -->
                    <div class="mt-4 pt-4 border-t border-outline-variant/40 flex justify-between items-center">
                        <button type="button" onclick="openAnnouncementModal('{{ addslashes($ann->title) }}', '{{ $ann->category ?? 'Pengumuman' }}', '{{ $formattedDate }}', {!! $jsContent !!}, '{{ $imageUrl }}')" class="text-primary font-bold flex items-center gap-1 text-xs hover:underline bg-transparent border-none p-0 cursor-pointer">
                            Baca Selengkapnya <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Modal: Announcement Detail -->
<div id="announcement-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="closeAnnouncementModal()"></div>
    <div class="relative bg-surface-container-lowest w-full max-w-2xl p-8 rounded-2xl shadow-2xl border border-outline-variant max-h-[90vh] flex flex-col overflow-hidden animate-in fade-in zoom-in duration-200">
        <button type="button" class="absolute top-4 right-4 p-2 hover:bg-surface-container rounded-full text-on-surface-variant z-10" onclick="closeAnnouncementModal()">
            <span class="material-symbols-outlined">close</span>
        </button>
        
        <div class="overflow-y-auto flex-1 pr-2 space-y-6">
            <div class="relative aspect-[16/9] w-full bg-surface-container-low rounded-xl overflow-hidden">
                <img id="modal-ann-image" src="" alt="" class="w-full h-full object-cover">
                <span id="modal-ann-category" class="absolute top-4 left-4 inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed text-xs font-bold rounded-md shadow-sm"></span>
            </div>
            
            <div class="space-y-2">
                <div class="flex items-center gap-4 text-xs font-bold text-on-surface-variant uppercase tracking-wider">
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_month</span> <span id="modal-ann-date"></span></span>
                </div>
                <h3 id="modal-ann-title" class="text-2xl font-bold text-primary leading-tight"></h3>
            </div>
            
            <div id="modal-ann-content" class="text-on-surface-variant leading-relaxed text-justify space-y-4 font-body-md text-sm border-t border-outline-variant/40 pt-4">
            </div>
        </div>
    </div>
</div>

<script>
    function openAnnouncementModal(title, category, date, content, image) {
        document.getElementById('modal-ann-title').textContent = title;
        document.getElementById('modal-ann-category').textContent = category;
        document.getElementById('modal-ann-date').textContent = date;
        document.getElementById('modal-ann-content').innerHTML = content;
        
        const imgEl = document.getElementById('modal-ann-image');
        if (image) {
            imgEl.src = image;
            imgEl.parentElement.classList.remove('hidden');
        } else {
            imgEl.parentElement.classList.add('hidden');
        }
        
        document.getElementById('announcement-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeAnnouncementModal() {
        document.getElementById('announcement-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endif

<!-- School Achievements Grid -->
@if ($achievements->isNotEmpty())
<section class="py-section-gap bg-surface-container">
    <div class="px-margin-desktop max-w-container-max mx-auto flex flex-col sm:flex-row justify-between items-center mb-12">
        <div class="text-center sm:text-left mb-6 sm:mb-0">
            <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Prestasi Madrasah</h3>
            <p class="text-on-surface-variant">Kebanggaan kami dalam mencetak generasi berprestasi.</p>
        </div>
        <a href="/achievements" class="bg-primary text-on-primary px-6 py-3 rounded-lg font-bold hover:opacity-90 transition-opacity shadow-md flex items-center gap-2">
            <span class="material-symbols-outlined">emoji_events</span> Lihat Semua Prestasi
        </a>
    </div>
    <div class="px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($achievements->take(4) as $ach)
            <div class="bg-surface p-6 rounded-lg border border-outline-variant flex flex-col justify-between hover:bg-secondary-fixed transition-colors group">
                <div>
                    <span class="material-symbols-outlined text-4xl text-primary mb-4 group-hover:scale-110 transition-transform block" style="font-variation-settings: 'FILL' 1;">military_tech</span>
                    <h5 class="font-bold text-primary font-headline-sm mb-1 leading-snug">{{ $ach->title }}</h5>
                    <p class="text-sm text-on-surface-variant font-semibold mb-2">Peraih: {{ $ach->achiever_name }}</p>
                </div>
                <p class="text-xs opacity-75 font-bold uppercase tracking-wider text-primary">{{ $ach->category }} ({{ \Carbon\Carbon::parse($ach->date)->format('Y') }})</p>
            </div>
        @endforeach
    </div>
</section>
@endif

<!-- Virtual Tour Preview -->
@if ($virtualTours->isNotEmpty())
@php
    $tour = $virtualTours->first();
    $tourImage = '';
    if ($tour && !empty($tour->image_paths)) {
        if (is_array($tour->image_paths)) {
            $tourImage = $tour->image_paths[0] ?? '';
        } elseif (is_string($tour->image_paths)) {
            $decoded = json_decode($tour->image_paths, true);
            $tourImage = !empty($decoded) ? $decoded[0] : '';
        }
    }
    
    $resolvedTourImage = '';
    if (!empty($tourImage)) {
        $resolvedTourImage = filter_var($tourImage, FILTER_VALIDATE_URL)
            ? $tourImage
            : (Str::startsWith($tourImage, ['/storage', 'storage']) ? asset($tourImage) : asset('storage/' . ltrim($tourImage, '/')));
    }
@endphp
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover brightness-50" style="background-image: url('{{ $resolvedTourImage }}')"></div>
    <div class="relative z-10 px-margin-desktop max-w-container-max mx-auto text-center text-on-primary text-white">
        <h3 class="font-display-lg text-display-lg mb-6 text-white text-4xl font-bold">Virtual School Tour</h3>
        <p class="text-body-lg mb-8 max-w-2xl mx-auto text-white/90">Jelajahi {{ $tour->name }} kami secara digital, rasakan atmosfer lingkungan belajar kami dari manapun Anda berada.</p>
        <a href="/virtual-tour" class="bg-white text-primary px-10 py-4 rounded-lg font-bold text-lg hover:scale-105 transition-transform flex items-center gap-3 mx-auto shadow-lg w-fit">
            <span class="material-symbols-outlined">vrpano</span>
            Mulai Tour 360°
        </a>
    </div>
</section>
@endif

<!-- FAQ Preview -->
@if ($faqs->isNotEmpty())
<section class="py-section-gap bg-surface px-margin-desktop max-w-container-max mx-auto">
    <div class="grid md:grid-cols-2 gap-16">
        <div class="space-y-6">
            <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Pertanyaan Sering Diajukan (FAQ)</h3>
            <p class="text-on-surface-variant">Cari jawaban cepat untuk pertanyaan umum mengenai pendaftaran dan program sekolah kami.</p>
            <div class="relative">
                <input class="w-full bg-surface-container border-none rounded-lg py-4 pl-12 pr-6 focus:ring-2 focus:ring-primary shadow-sm" id="faq-search" placeholder="Cari pertanyaan... (mis: pendaftaran, biaya)" type="text" oninput="filterFaqs()"/>
                <span class="material-symbols-outlined absolute left-4 top-4 text-on-surface-variant">search</span>
            </div>
        </div>
        <div class="space-y-4" id="faq-list">
            @foreach ($faqs->take(5) as $faq)
                <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-4 group cursor-pointer hover:shadow-sm transition-shadow faq-item" data-question="{{ strtolower($faq->question) }}" data-answer="{{ strtolower($faq->answer) }}">
                    <div class="flex justify-between items-center text-primary font-bold" onclick="toggleFaq({{ $faq->id }})">
                        <span>{{ $faq->question }}</span>
                        <span class="material-symbols-outlined transition-transform duration-300" id="faq-icon-{{ $faq->id }}">expand_more</span>
                    </div>
                    <div class="hidden text-on-surface-variant text-sm mt-3 pt-3 border-t border-outline-variant/40 leading-relaxed" id="faq-answer-{{ $faq->id }}">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function toggleFaq(id) {
        const ans = document.getElementById(`faq-answer-${id}`);
        const icon = document.getElementById(`faq-icon-${id}`);
        if (ans.classList.contains('hidden')) {
            ans.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            ans.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }

    function filterFaqs() {
        const query = document.getElementById('faq-search').value.toLowerCase().trim();
        const items = document.querySelectorAll('.faq-item');
        items.forEach(item => {
            const q = item.getAttribute('data-question');
            const a = item.getAttribute('data-answer');
            if (q.includes(query) || a.includes(query)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>
@endif

<!-- Contact & Map Section -->
<section id="kontak" class="py-section-gap px-margin-desktop max-w-container-max mx-auto bg-surface-container-lowest rounded-lg border border-outline-variant my-12 shadow-sm">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 p-8">
        <div class="lg:col-span-5 space-y-8">
            <div>
                <h3 class="text-primary font-headline-lg text-headline-lg font-bold">Hubungi Kami</h3>
                <p class="text-on-surface-variant">Kami siap melayani Anda di jam kerja operasional madrasah.</p>
            </div>
            <div class="bg-surface-container-low p-4 rounded-lg flex items-center justify-between">
                <div>
                    <p class="font-bold text-sm text-on-surface">Jam Operasional (Kantor)</p>
                    <p class="text-xs text-on-surface-variant mt-1">{{ $settings['contact_hours'] ?? 'Senin - Sabtu: 07.00 - 15.00 WIB' }}</p>
                </div>
                <span class="material-symbols-outlined text-primary text-3xl opacity-50">schedule</span>
            </div>
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary bg-primary-fixed p-3 rounded-lg">location_on</span>
                    <div>
                        <p class="font-bold">Alamat Utama</p>
                        <p class="text-on-surface-variant text-sm mb-2">{{ $settings['contact_address'] ?? 'Jl. Kebangkitan No. 45, Jawa Timur' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-[#25D366] bg-[#25D366]/10 p-3 rounded-lg">chat</span>
                    <div>
                        <p class="font-bold">WhatsApp Admin</p>
                        <p class="text-on-surface-variant text-sm mb-2">{{ $settings['contact_whatsapp'] ?? '+62 812 3456 7890' }}</p>
                        <a class="text-sm font-bold text-[#25D366] flex items-center gap-1 hover:underline" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_whatsapp'] ?? '') }}" target="_blank">Chat Sekarang <span class="material-symbols-outlined text-sm">open_in_new</span></a>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary bg-primary-fixed p-3 rounded-lg">mail</span>
                    <div>
                        <p class="font-bold">Email Resmi</p>
                        <p class="text-on-surface-variant text-sm mb-2">{{ $settings['contact_email'] ?? 'info@midarunnajah.sch.id' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-7 rounded-lg overflow-hidden h-full min-h-[350px] shadow-inner bg-surface-container-high relative border border-outline-variant">
            @if (!empty($settings['contact_maps']))
                @php
                    $mapsUrl = $settings['contact_maps'];
                    if (preg_match('/src="([^"]+)"/', $mapsUrl, $matches)) {
                        $mapsUrl = $matches[1];
                    }
                @endphp
                <iframe class="w-full h-full min-h-[350px] border-none" src="{{ $mapsUrl }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            @else
                <div class="absolute inset-0 flex flex-col items-center justify-center text-on-surface-variant/60">
                    <span class="material-symbols-outlined text-4xl mb-2">map</span>
                    <p class="text-xs">Peta belum diunggah</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-primary text-on-primary py-16 text-white">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto text-white">
        <div class="md:col-span-6 space-y-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">school</span>
                </div>
                <h1 class="font-headline-md text-headline-md font-bold text-white">{{ $settings['school_name'] }}</h1>
            </div>
            <p class="opacity-80 max-w-md text-sm leading-relaxed text-white">Lembaga pendidikan Islam yang berfokus pada pembentukan karakter Qur'ani dan keunggulan akademik yang kompetitif di era digital.</p>
        </div>
        <div class="md:col-span-3 space-y-4">
            <h6 class="font-bold uppercase tracking-widest text-secondary-fixed text-sm text-secondary-container">Tautan Cepat</h6>
            <nav class="flex flex-col gap-3 opacity-80 text-sm">
                <a class="hover:text-secondary-fixed transition-colors flex items-center gap-1" href="#sambutan"><span class="material-symbols-outlined text-xs">chevron_right</span> Profil Sekolah</a>
                <a class="hover:text-secondary-fixed transition-colors flex items-center gap-1" href="#program"><span class="material-symbols-outlined text-xs">chevron_right</span> Program Unggulan</a>
                <a class="hover:text-secondary-fixed transition-colors flex items-center gap-1" href="#warta"><span class="material-symbols-outlined text-xs">chevron_right</span> Berita Terkini</a>
                <a class="hover:text-secondary-fixed transition-colors flex items-center gap-1" href="/achievements"><span class="material-symbols-outlined text-xs">chevron_right</span> Galeri Prestasi</a>
            </nav>
        </div>
        <div class="md:col-span-3 space-y-4">
            <h6 class="font-bold uppercase tracking-widest text-secondary-fixed text-sm text-secondary-container">Media Sosial</h6>
            <div class="flex gap-6 pt-2">
                <!-- Instagram -->
                <a href="https://www.instagram.com/midarunnajah_srobyong.mlonggo?igsi=NDVrd3dxMGhjY3ll" target="_blank" class="flex flex-col items-center gap-2 group">
                    <div class="w-11 h-11 rounded-lg bg-white/10 flex items-center justify-center hover:bg-secondary-container hover:text-on-secondary-container transition-all hover:scale-110 shadow-md">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] opacity-75 group-hover:opacity-100 group-hover:text-secondary-fixed transition-colors font-medium">Instagram</span>
                </a>
                
                <!-- WhatsApp -->
                <a href="https://wa.me/6285293382850" target="_blank" class="flex flex-col items-center gap-2 group">
                    <div class="w-11 h-11 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#25D366] hover:text-white transition-all hover:scale-110 shadow-md">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.455 5.703 1.456h.004c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] opacity-75 group-hover:opacity-100 group-hover:text-secondary-fixed transition-colors font-medium">WhatsApp</span>
                </a>
                
                <!-- Gmail -->
                <a href="mailto:midarunnajahjepara@gmail.com" target="_blank" class="flex flex-col items-center gap-2 group">
                    <div class="w-11 h-11 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#EA4335] hover:text-white transition-all hover:scale-110 shadow-md">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 5.457v13.917c0 .904-.732 1.637-1.636 1.637h-3.819V11.5L12 16.64 5.455 11.5v9.511H1.636A1.638 1.638 0 010 19.374V5.457c0-.904.732-1.636 1.636-1.636h3.819L12 9.49l6.545-5.67h3.819C23.268 3.82 24 4.553 24 5.457z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] opacity-75 group-hover:opacity-100 group-hover:text-secondary-fixed transition-colors font-medium">Gmail</span>
                </a>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10 pt-8 mt-8 text-center px-margin-desktop opacity-60 text-xs">
        <p>© 2026 {{ $settings['school_name'] }}. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>