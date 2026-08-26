<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>School Profile Settings - MI Darun Najah Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Work Sans', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .active-nav-border {
            border-right: 3px solid #004c4c;
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #004c4c;
            border-radius: 10px;
        }
    </style>
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
                    "spacing": {
                        "section-gap": "80px",
                        "margin-desktop": "40px",
                        "container-max": "1200px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
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
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">
@include('admin.partials.sidebar', ['active' => 'school_profile'])

<!-- Main Content Area -->
<form action="/admin/settings" method="POST" enctype="multipart/form-data" class="ml-64 min-h-screen flex flex-col bg-background">
    @csrf
    <!-- TopNavBar -->
    <header class="h-16 flex items-center justify-between px-10 bg-surface border-b border-outline-variant sticky top-0 z-40">
        <div>
            <h2 class="font-headline-md text-headline-md font-bold text-primary">School Profile &amp; Settings</h2>
            <p class="text-on-surface-variant text-xs">Manage your institution's public identity and core information.</p>
        </div>
        <div class="flex gap-4">
            <button type="reset" class="px-6 py-2 border-2 border-outline-variant text-primary font-bold rounded-lg hover:bg-surface-container-low transition-all active:scale-95">Reset</button>
            <button type="submit" class="px-6 py-2 bg-primary text-on-primary font-bold rounded-lg shadow-md hover:bg-primary/90 transition-all active:scale-95">Save Changes</button>
        </div>
    </header>

    <!-- Content Wrapper -->
    <div class="flex-grow p-10 space-y-10 overflow-y-auto">
        <!-- Alert Messages -->
        @if (session('success'))
            <div class="p-4 bg-tertiary-container/20 border border-tertiary text-primary rounded-xl flex items-center gap-3">
                <span class="material-symbols-outlined text-tertiary">check_circle</span>
                <p class="font-label-md">{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-12 gap-8">
            <!-- Section 1: General Information -->
            <div class="col-span-12 lg:col-span-8 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm space-y-6">
                <div class="flex items-center gap-3 border-b border-outline-variant/60 pb-4">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">info</span>
                    <h3 class="font-headline-md text-headline-md font-bold">General Information</h3>
                </div>

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Institutional Name</label>
                    <input class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" type="text" name="school_name" value="{{ $settings['school_name'] ?? 'MI Darun Najah' }}">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">School Logo</label>
                        <div class="flex items-center gap-4 border border-dashed border-outline-variant p-4 rounded-lg">
                            @if (!empty($settings['school_logo']))
                                <img class="w-16 h-16 rounded shadow-sm object-cover" src="{{ filter_var($settings['school_logo'], FILTER_VALIDATE_URL) ? $settings['school_logo'] : asset('storage/' . $settings['school_logo']) }}">
                            @else
                                <div class="w-16 h-16 rounded bg-primary/10 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-2xl">school</span>
                                </div>
                            @endif
                             <div class="flex-grow">
                                <input type="file" id="school-logo-input" name="school_logo" class="w-full text-xs" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">NPSN / Accreditation</label>
                        <input class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" name="school_accreditation" value="{{ $settings['school_accreditation'] ?? 'Grade A' }}" type="text">
                    </div>
                </div>

                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Cover Image (Homepage Banner)</label>
                    <div class="border border-dashed border-outline-variant p-4 rounded-lg flex items-center gap-4">
                        @if (!empty($settings['school_cover_image']))
                            <img class="w-24 h-16 rounded object-cover" src="{{ filter_var($settings['school_cover_image'], FILTER_VALIDATE_URL) ? $settings['school_cover_image'] : asset('storage/' . $settings['school_cover_image']) }}">
                        @endif
                        <div class="flex-grow">
                            <input type="file" id="school-cover-input" name="school_cover_image" class="w-full text-xs" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Contact & Socials -->
            <div class="col-span-12 lg:col-span-4 space-y-8">
                <div class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm space-y-4">
                    <div class="flex items-center gap-3 border-b border-outline-variant/60 pb-4">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">contact_support</span>
                        <h3 class="font-headline-md text-headline-md font-bold">Contact</h3>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Email Address</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant text-label-md" type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'midarunnajahjepara@gmail.com' }}">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">WhatsApp</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant text-label-md" type="text" name="contact_whatsapp" value="{{ $settings['contact_whatsapp'] ?? '+62 812 3456 7890' }}">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Operating Hours</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant text-label-md" type="text" name="contact_hours" value="{{ $settings['contact_hours'] ?? 'Mon - Sat: 07:00 - 15:00' }}">
                    </div>
                </div>

                <div class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm space-y-4">
                    <div class="flex items-center gap-3 border-b border-outline-variant/60 pb-4">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">share</span>
                        <h3 class="font-headline-md text-headline-md font-bold">Social Presence</h3>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Instagram</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant text-label-md" name="contact_instagram" value="{{ $settings['contact_instagram'] ?? '@mi_darunnajah' }}" type="text">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Youtube</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant text-label-md" name="contact_youtube" value="{{ $settings['contact_youtube'] ?? '' }}" placeholder="Youtube Channel Link" type="text">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Facebook</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant text-label-md" name="contact_facebook" value="{{ $settings['contact_facebook'] ?? '' }}" placeholder="Facebook Page Link" type="text">
                    </div>
                </div>
            </div>

            <!-- Section 3: Academic Foundations -->
            <div class="col-span-12 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm space-y-6">
                <div class="flex items-center gap-3 border-b border-outline-variant/60 pb-4">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">history_edu</span>
                    <h3 class="font-headline-md text-headline-md font-bold">Academic Foundation</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-6">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Vision Statement</label>
                            <textarea class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" name="school_vision" rows="3">{{ $settings['school_vision'] ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Mission Statement (HTML / Bullet List)</label>
                            <textarea class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" name="school_mission" rows="4">{{ $settings['school_mission'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">School History / Description</label>
                            <textarea class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" name="school_history" rows="9">{{ $settings['school_history'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Principal Details & Maps -->
            <div class="col-span-12 lg:col-span-6 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm space-y-6">
                <div class="flex items-center gap-3 border-b border-outline-variant/60 pb-4">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">person</span>
                    <h3 class="font-headline-md text-headline-md font-bold">Principal Details</h3>
                </div>
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-48">
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Official Portrait</label>
                        <div class="relative group border border-outline-variant rounded-lg overflow-hidden">
                            @if (!empty($settings['headmaster_photo']))
                                <img class="w-full aspect-[3/4] object-cover" src="{{ filter_var($settings['headmaster_photo'], FILTER_VALIDATE_URL) ? $settings['headmaster_photo'] : (Str::startsWith($settings['headmaster_photo'], ['/storage', 'storage']) ? asset($settings['headmaster_photo']) : asset('storage/' . $settings['headmaster_photo'])) }}">
                            @else
                                <div class="w-full aspect-[3/4] bg-primary/10 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-4xl">account_box</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity rounded-lg cursor-pointer">
                                <input type="file" id="headmaster-photo-input" name="headmaster_photo" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                                <span class="material-symbols-outlined text-white text-3xl">add_a_photo</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 space-y-4">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Full Name &amp; Titles</label>
                            <input class="w-full px-4 py-2 rounded-lg border border-outline-variant" type="text" name="headmaster_name" value="{{ $settings['headmaster_name'] ?? 'Dr. H. Ahmad Fauzi, M.Pd.' }}">
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Headmaster Quote</label>
                            <input class="w-full px-4 py-2 rounded-lg border border-outline-variant" type="text" name="headmaster_quote" value="{{ $settings['headmaster_quote'] ?? 'Mendidik dengan hati, membimbing dengan Al-Qur\'an.' }}">
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Welcome Message</label>
                            <textarea class="w-full px-4 py-2 rounded-lg border border-outline-variant text-sm italic" name="headmaster_greeting" rows="5">{{ $settings['headmaster_greeting'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5: Location mapping -->
            <div class="col-span-12 lg:col-span-6 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant shadow-sm space-y-6">
                <div class="flex items-center gap-3 border-b border-outline-variant/60 pb-4">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">location_on</span>
                    <h3 class="font-headline-md text-headline-md font-bold">Location Mapping</h3>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Physical Address</label>
                        <textarea class="w-full px-4 py-2 rounded-lg border border-outline-variant" name="contact_address" rows="3">{{ $settings['contact_address'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Google Maps Embed URL</label>
                        <input class="w-full px-4 py-2 rounded-lg border border-outline-variant mb-3" name="contact_maps" value="{{ $settings['contact_maps'] ?? '' }}" placeholder="https://www.google.com/maps/embed?pb=..." type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('js/image-cropper.js') }}"></script>
<script>
    function handleLogout(e) {
        e.preventDefault();
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/logout';
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);
        document.body.appendChild(form);
        form.submit();
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Bind Logo (Square Ratio)
        attachCropper(document.getElementById('school-logo-input'), {
            aspectRatio: 1,
            previewImageElement: document.querySelector('img[src*="school_logo"]') || document.querySelector('img[src*="logo"]')
        });

        // Bind Cover Image (16/9 Ratio)
        attachCropper(document.getElementById('school-cover-input'), {
            aspectRatio: 16/9,
            previewImageElement: document.querySelector('img[src*="school_cover"]') || document.querySelector('img[src*="cover"]')
        });

        // Bind Headmaster Portrait (3/4 Ratio)
        attachCropper(document.getElementById('headmaster-photo-input'), {
            aspectRatio: 3/4,
            previewImageElement: document.querySelector('img[src*="headmaster"]')
        });
    });
</script>
</body>
</html>
