<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profil Guru - {{ $teacher->name }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-fixed-variant": "#574500",
                        "tertiary": "#004f26",
                        "surface-container-high": "#e7e8e9",
                        "outline": "#6f7979",
                        "inverse-surface": "#2e3132",
                        "surface-container": "#edeeef",
                        "on-surface": "#191c1d",
                        "on-secondary-container": "#745c00",
                        "on-background": "#191c1d",
                        "tertiary-fixed": "#6bfe9c",
                        "on-tertiary-fixed": "#00210c",
                        "surface-container-highest": "#e1e3e4",
                        "inverse-on-surface": "#f0f1f2",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "secondary-fixed-dim": "#e9c349",
                        "surface-tint": "#096969",
                        "on-primary-fixed-variant": "#004f4f",
                        "on-error": "#ffffff",
                        "surface-container-low": "#f3f4f5",
                        "on-secondary-fixed": "#241a00",
                        "secondary-container": "#fed65b",
                        "on-primary-fixed": "#002020",
                        "surface-dim": "#d9dadb",
                        "on-error-container": "#93000a",
                        "tertiary-container": "#006a35",
                        "surface-variant": "#e1e3e4",
                        "outline-variant": "#bec9c8",
                        "on-primary": "#ffffff",
                        "surface-bright": "#f8f9fa",
                        "primary": "#004c4c",
                        "on-tertiary": "#ffffff",
                        "background": "#f8f9fa",
                        "on-primary-container": "#93e1e0",
                        "primary-fixed": "#a2f0ef",
                        "on-tertiary-container": "#5aef8f",
                        "on-tertiary-fixed-variant": "#005228",
                        "secondary-fixed": "#ffe088",
                        "tertiary-fixed-dim": "#4ae183",
                        "primary-container": "#006666",
                        "secondary": "#735c00",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#86d4d3",
                        "on-surface-variant": "#3f4948",
                        "inverse-primary": "#86d4d3",
                        "error": "#ba1a1a",
                        "surface": "#f8f9fa"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
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
                        "headline-lg": ["Manrope"],
                        "label-sm": ["Work Sans"],
                        "body-md": ["Work Sans"],
                        "body-lg": ["Work Sans"],
                        "label-md": ["Work Sans"],
                        "display-lg": ["Manrope"],
                        "headline-md": ["Manrope"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["28px", { "lineHeight": "1.3", "fontWeight": "700" }],
                        "headline-lg": ["32px", { "lineHeight": "1.3", "fontWeight": "700" }],
                        "label-sm": ["12px", { "lineHeight": "1.2", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-md": ["14px", { "lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "display-lg": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "headline-md": ["24px", { "lineHeight": "1.4", "fontWeight": "600" }]
                    }
                },
            }
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
<body class="bg-background text-on-background font-body-md min-h-screen">
<!-- Running Announcement Bar -->
@if ($settings['announcement_bar_active'] && !empty($settings['announcement_bar_text']))
<div class="bg-primary text-on-primary py-2 overflow-hidden whitespace-nowrap sticky top-0 z-[60]">
    <div class="animate-scroll inline-block font-label-md">
        @if (!empty($settings['announcement_bar_link']))
            <a href="{{ $settings['announcement_bar_link'] }}" target="_blank" class="hover:underline">{{ $settings['announcement_bar_text'] }}</a>
        @else
            {{ $settings['announcement_bar_text'] }}
        @endif
    </div>
</div>
@endif

<!-- TopAppBar -->
<nav class="bg-surface border-b border-outline-variant top-0 z-50 sticky transition-all duration-300 ease-in-out">
    <div class="flex justify-between items-center h-20 px-margin-desktop max-w-container-max mx-auto">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center text-on-primary-container">
                <span class="material-symbols-outlined text-3xl">school</span>
            </div>
            <div>
                <h1 class="font-headline-md text-headline-md font-bold text-primary">{{ $settings['school_name'] }}</h1>
                <p class="font-label-sm text-label-sm text-on-surface-variant tracking-wider uppercase">Cerdas Terampil Berakhlaq Mulia</p>
            </div>
        </div>
        <div class="hidden md:flex items-center space-x-gutter">
            <a class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md p-2 rounded" href="/">Home</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md p-2 rounded" href="/#sambutan">Profile</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md p-2 rounded" href="/#program">Program</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md p-2 rounded" href="/achievements">Information</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-label-md text-label-md p-2 rounded" href="/#kontak">Contact</a>
        </div>
        <div class="flex items-center space-x-2">
            <span class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full cursor-pointer transition-all">public</span>
            <a href="/login" class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-all" title="Portal Admin">person</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12">
    <!-- Back Button -->
    <div class="mb-8">
        <a href="/#teachers" class="flex items-center text-primary font-label-md text-label-md hover:text-primary-container transition-colors group">
            <span class="material-symbols-outlined mr-2 group-hover:-translate-x-1 transition-transform">arrow_back</span>
            Kembali ke Beranda
        </a>
    </div>

    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
        <!-- Header Banner Section -->
        <div class="relative w-full h-48 md:h-64 bg-primary-container">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
        </div>

        <div class="px-margin-mobile md:px-gutter pb-gutter relative -mt-24 md:-mt-32 flex flex-col md:flex-row gap-gutter">
            <!-- Profile Image -->
            <div class="flex-shrink-0 z-10 mx-auto md:mx-0">
                <div class="w-48 h-48 md:w-64 md:h-64 rounded-xl border-4 border-surface-container-lowest overflow-hidden bg-surface-container shadow-md">
                    @if ($teacher->photo_path)
                        <img alt="{{ $teacher->name }}" class="w-full h-full object-cover" src="{{ filter_var($teacher->photo_path, FILTER_VALIDATE_URL) ? $teacher->photo_path : asset('storage/' . $teacher->photo_path) }}"/>
                    @else
                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-4xl">
                            {{ substr($teacher->name, 0, 1) }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Basic Info -->
            <div class="flex-grow pt-4 md:pt-36 text-center md:text-left z-10">
                <h1 class="font-headline-lg md:font-display-lg text-primary font-bold mb-2">{{ $teacher->name }}</h1>
                <p class="font-headline-md text-on-surface-variant mb-4">
                    @if(($teacher->role ?? 'Guru') !== 'Guru')
                        {{ $teacher->role }} - Bidang {{ $teacher->subject }}
                    @else
                        Pendidik Mata Pelajaran {{ $teacher->subject }}
                    @endif
                </p>
                <div class="flex flex-wrap justify-center md:justify-start gap-6 mb-6 text-sm text-on-surface-variant">
                    @if ($teacher->nip)
                        <div class="flex items-center">
                            <span class="material-symbols-outlined mr-2 text-primary">badge</span>
                            NUPTK/NIP: {{ $teacher->nip }}
                        </div>
                    @endif
                    <div class="flex items-center">
                        <span class="material-symbols-outlined mr-2 text-primary">subject</span>
                        Bidang: {{ $teacher->subject }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Content Grid -->
        <div class="px-margin-mobile md:px-gutter py-12 grid grid-cols-1 lg:grid-cols-3 gap-8 border-t border-outline-variant/30">
            <!-- Left Column (Bio & Philosophy) -->
            <div class="lg:col-span-2 space-y-8">
                <section class="bg-surface-bright rounded-xl p-8 border border-outline-variant/20">
                    <h2 class="font-headline-md text-primary font-bold mb-4 flex items-center">
                        <span class="material-symbols-outlined mr-2 bg-primary/10 text-primary p-2 rounded-lg">person_book</span>
                        Biografi Lengkap
                    </h2>
                    <div class="font-body-md text-on-surface-variant leading-relaxed text-justify space-y-4">
                        @if ($teacher->bio)
                            <p>{{ $teacher->bio }}</p>
                        @else
                            <p>Ustadz/Ustadzah {{ $teacher->name }} merupakan tenaga pendidik profesional di {{ $settings['school_name'] }} yang mendampingi siswa-siswi dengan penuh integritas dan cinta kasih untuk menumbuhkan kepribadian Islamiah yang mulia.</p>
                        @endif
                    </div>
                </section>

                @if ($teacher->quote)
                    <section class="bg-surface-bright rounded-xl p-8 border border-outline-variant/20">
                        <h2 class="font-headline-md text-primary font-bold mb-4 flex items-center">
                            <span class="material-symbols-outlined mr-2 bg-primary/10 text-primary p-2 rounded-lg">psychology</span>
                            Pesan &amp; Kutipan Inspiratif
                        </h2>
                        <blockquote class="border-l-4 border-secondary-container pl-4 italic font-body-lg text-on-surface my-4">
                            "{{ $teacher->quote }}"
                        </blockquote>
                    </section>
                @endif
            </div>

            <!-- Right Column (Stats, Edu, Experience) -->
            <div class="space-y-8">
                <!-- Educational Background -->
                <section class="bg-surface-bright rounded-xl p-8 border border-outline-variant/20">
                    <h2 class="font-headline-md text-primary font-bold mb-6 border-b border-outline-variant/20 pb-2">Riwayat Pendidikan</h2>
                    <div class="relative pl-6 border-l-2 border-primary/20 space-y-6">
                        @if ($teacher->education)
                            @foreach (explode("\n", $teacher->education) as $edu)
                                @if (trim($edu))
                                    <div class="relative">
                                        <div class="absolute -left-[31px] bg-surface-bright p-1 rounded-full border-2 border-primary text-primary">
                                            <span class="material-symbols-outlined text-[16px]">school</span>
                                        </div>
                                        <p class="font-label-md text-on-surface leading-snug">{{ $edu }}</p>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p class="text-sm text-on-surface-variant">Data belum diunggah.</p>
                        @endif
                    </div>
                </section>

                <!-- Professional Experience -->
                <section class="bg-surface-bright rounded-xl p-8 border border-outline-variant/20">
                    <h2 class="font-headline-md text-primary font-bold mb-6 border-b border-outline-variant/20 pb-2">Riwayat Pengalaman</h2>
                    <ul class="space-y-4">
                        @if ($teacher->experience)
                            @foreach (explode("\n", $teacher->experience) as $exp)
                                @if (trim($exp))
                                    <li class="flex items-start">
                                        <div class="bg-primary/10 text-primary p-2 rounded-lg mr-4 mt-1">
                                            <span class="material-symbols-outlined text-[20px]">work</span>
                                        </div>
                                        <div>
                                            <p class="font-label-md text-on-surface leading-snug">{{ $exp }}</p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li class="flex items-start">
                                <div class="bg-primary/10 text-primary p-2 rounded-lg mr-4 mt-1">
                                    <span class="material-symbols-outlined text-[20px]">work</span>
                                </div>
                                <div>
                                    <p class="font-label-md text-on-surface">Pendidik Aktif</p>
                                    <p class="font-label-sm text-on-surface-variant">{{ $settings['school_name'] }}</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </section>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="w-full bg-primary text-on-primary">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto">
        <div class="md:col-span-6 flex flex-col gap-4">
            <span class="font-headline-md text-headline-md font-bold">{{ $settings['school_name'] }}</span>
            <p class="font-body-md text-body-md opacity-80 max-w-md">Lembaga pendidikan Islam yang berfokus pada pembentukan karakter Qur'ani dan keunggulan akademik yang kompetitif di era digital.</p>
        </div>
        <div class="md:col-span-6 flex justify-end gap-12 flex-wrap items-center">
            <p class="text-sm opacity-80">Hubungi kami: {{ $settings['contact_email'] }} | {{ $settings['contact_phone'] }}</p>
        </div>
        <div class="md:col-span-12 mt-8 pt-8 border-t border-on-primary/20 text-center flex justify-between items-center text-xs opacity-60">
            <span>© 2026 {{ $settings['school_name'] }}. All Rights Reserved.</span>
        </div>
    </div>
</footer>
</body>
</html>
