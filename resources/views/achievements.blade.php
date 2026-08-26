<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $settings['school_name'] }} - Galeri Prestasi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "0.5rem",
                        "xl": "0.5rem",
                        "full": "9999px"
                    },
                    "maxWidth": {
                        "container-max": "1200px"
                    },
                    spacing: {
                        "section-gap": "80px",
                        "margin-desktop": "40px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "base": "8px"
                    },
                    fontFamily: {
                        "headline-lg-mobile": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "label-sm": ["Work Sans"],
                        "body-md": ["Work Sans"],
                        "body-lg": ["Work Sans"],
                        "label-md": ["Work Sans"],
                        "display-lg": ["Manrope"],
                        "headline-md": ["Manrope"]
                    },
                    fontSize: {
                        "headline-lg-mobile": ["28px", { "lineHeight": "1.3", "fontWeight": "700" }],
                        "headline-lg": ["32px", { "lineHeight": "1.3", "fontWeight": "700" }],
                        "label-sm": ["12px", { "lineHeight": "1.2", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-md": ["14px", { "lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "display-lg": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "headline-md": ["24px", { "lineHeight": "1.4", "fontWeight": "600" }]
                    }
                }
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
<body class="bg-background text-on-background antialiased selection:bg-primary-container selection:text-on-primary-container">
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
<header class="bg-surface border-b border-outline-variant top-0 z-50 sticky transition-all duration-300 ease-in-out">
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
        <nav class="hidden md:flex gap-8">
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="/">Home</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="/#sambutan">Profile</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="/#program">Program</a>
            <a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1 font-bold" href="/achievements">Information</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="/#kontak">Contact</a>
        </nav>
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full cursor-pointer transition-all">public</span>
            <a href="/login" class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-all" title="Portal Admin">person</a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="w-full pb-section-gap">
    <!-- Hero Section -->
    <section class="relative w-full h-[350px] flex items-center justify-center overflow-hidden bg-primary-container">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover opacity-30" src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&q=80&w=2070">
        </div>
        <div class="relative z-10 text-center max-w-3xl px-margin-mobile text-on-primary">
            <h1 class="font-display-lg text-display-lg mb-4 text-white">Galeri Prestasi</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed">Kumpulan pencapaian luar biasa siswa dan tim pendidik {{ $settings['school_name'] }}.</p>
        </div>
    </section>

    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-12">
        <!-- Filter Bar -->
        <form action="/achievements" method="GET" class="flex flex-col md:flex-row gap-6 mb-12 items-end border-b border-outline-variant pb-6">
            <div class="flex-1 w-full flex flex-wrap gap-4">
                <a href="/achievements?category=all&year={{ request('year', 'all') }}" class="font-label-md text-label-md px-6 py-2 rounded-full {{ request('category', 'all') === 'all' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface' }} transition-all">Semua Kategori</a>
                <a href="/achievements?category=Academic&year={{ request('year', 'all') }}" class="font-label-md text-label-md px-6 py-2 rounded-full {{ request('category') === 'Academic' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface' }} transition-all">Akademik</a>
                <a href="/achievements?category=Non-Academic&year={{ request('year', 'all') }}" class="font-label-md text-label-md px-6 py-2 rounded-full {{ request('category') === 'Non-Academic' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface' }} transition-all">Non-Akademik</a>
            </div>
            <div class="w-full md:w-auto flex items-center gap-4">
                <label class="font-label-sm text-label-sm text-on-surface-variant shrink-0">Filter Tahun:</label>
                <select name="year" onchange="this.form.submit()" class="bg-surface border border-outline-variant text-on-surface text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    <option value="all" {{ request('year') === 'all' ? 'selected' : '' }}>Semua Tahun</option>
                    @for ($y = date('Y'); $y >= 2022; $y--)
                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
            </div>
        </form>

        <!-- Bento Grid Gallery -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse ($achievements as $ach)
                <div class="group relative overflow-hidden rounded-2xl bg-surface-container-lowest shadow-sm border border-outline-variant/30 flex flex-col hover:shadow-md transition-all duration-300">
                    <div class="relative w-full aspect-video overflow-hidden bg-surface-container">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ filter_var($ach->image_path, FILTER_VALIDATE_URL) ? $ach->image_path : asset('storage/' . $ach->image_path) }}" alt="{{ $ach->title }}">
                        <div class="absolute top-4 left-4 flex gap-2">
                            <span class="bg-primary/95 text-on-primary px-3 py-1 rounded-full font-label-sm text-[10px] backdrop-blur-sm">{{ $ach->category }}</span>
                            <span class="bg-surface/95 text-on-surface px-3 py-1 rounded-full font-label-sm text-[10px] backdrop-blur-sm">{{ \Carbon\Carbon::parse($ach->date)->format('Y') }}</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-headline-md text-headline-md text-on-surface mb-2 text-lg font-bold leading-tight group-hover:text-primary transition-colors">{{ $ach->title }}</h3>
                            <p class="text-xs text-on-surface-variant/80 mb-3 font-semibold">Peraih: {{ $ach->achiever_name }} ({{ $ach->rank }})</p>
                            <p class="font-body-md text-body-md text-on-surface-variant text-sm line-clamp-3">{{ $ach->description }}</p>
                        </div>
                        <div class="mt-4 pt-4 border-t border-outline-variant/30 flex justify-between items-center text-xs text-on-surface-variant">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_month</span> {{ \Carbon\Carbon::parse($ach->date)->translatedFormat('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-on-surface-variant">
                    <span class="material-symbols-outlined text-5xl mb-4 text-outline-variant">emoji_events</span>
                    <p class="font-label-md">Tidak ada prestasi yang cocok dengan kriteria filter.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $achievements->links() }}
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
