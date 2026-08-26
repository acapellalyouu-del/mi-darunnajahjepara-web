<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin Login | {{ $school_name ?? 'MI Darun Najah' }}</title>
    <link rel="icon" type="image/jpeg" href="/images/logo.jpg"/>
    <link rel="shortcut icon" href="/images/logo.jpg"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed": "#6bfe9c",
                        "surface-variant": "#e1e3e4",
                        "surface-container": "#edeeef",
                        "inverse-surface": "#2e3132",
                        "background": "#f8f9fa",
                        "on-secondary": "#ffffff",
                        "on-surface": "#191c1d",
                        "on-primary-fixed": "#002020",
                        "primary-fixed-dim": "#86d4d3",
                        "outline-variant": "#bec9c8",
                        "on-tertiary-fixed-variant": "#005228",
                        "tertiary-container": "#006a35",
                        "on-secondary-fixed": "#241a00",
                        "surface-container-high": "#e7e8e9",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#86d4d3",
                        "tertiary": "#004f26",
                        "secondary": "#735c00",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#fed65b",
                        "on-error-container": "#93000a",
                        "primary": "#004c4c",
                        "tertiary-fixed-dim": "#4ae183",
                        "on-surface-variant": "#3f4948",
                        "on-background": "#191c1d",
                        "secondary-fixed": "#ffe088",
                        "surface-tint": "#096969",
                        "surface-container-low": "#f3f4f5",
                        "surface-container-highest": "#e1e3e4",
                        "on-tertiary-container": "#5aef8f",
                        "primary-fixed": "#a2f0ef",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "inverse-on-surface": "#f0f1f2",
                        "surface-dim": "#d9dadb",
                        "on-secondary-fixed-variant": "#574500",
                        "on-primary-container": "#93e1e0",
                        "error": "#ba1a1a",
                        "on-secondary-container": "#745c00",
                        "on-tertiary-fixed": "#00210c",
                        "surface-bright": "#f8f9fa",
                        "surface-container-lowest": "#ffffff",
                        "surface": "#f8f9fa",
                        "outline": "#6f7979",
                        "on-primary-fixed-variant": "#004f4f",
                        "secondary-fixed-dim": "#e9c349",
                        "primary-container": "#006666"
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
                        "gutter": "24px",
                        "margin-mobile": "16px",
                        "base": "8px"
                    },
                    "fontFamily": {
                        "label-sm": ["Work Sans"],
                        "body-md": ["Work Sans"],
                        "body-lg": ["Work Sans"],
                        "display-lg": ["Manrope"],
                        "label-md": ["Work Sans"],
                        "headline-md": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-lg": ["Manrope"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {"lineHeight": "1.2", "fontWeight": "500"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                        "label-md": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "headline-lg-mobile": ["28px", {"lineHeight": "1.3", "fontWeight": "700"}],
                        "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "700"}]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Work Sans', sans-serif;
        }
        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l2.5 7.5L40 10l-7.5 2.5L30 20l-2.5-7.5L20 10l7.5-2.5L30 0zm0 40l2.5 7.5L40 50l-7.5 2.5L30 60l-2.5-7.5L20 50l7.5-2.5L30 40zM0 30l7.5 2.5L10 40l2.5-7.5L20 30l-7.5-2.5L10 20l-2.5 7.5L0 30zm40 0l7.5 2.5L50 40l2.5-7.5L60 30l-7.5-2.5L50 20l-2.5 7.5L40 30z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 md:p-8 bg-surface">
    <main class="w-full max-w-5xl bg-surface-container-lowest rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col md:flex-row min-h-[600px] border border-outline-variant/30">
        <!-- Left Side: Dark Teal Side -->
        <section class="md:w-5/12 bg-primary relative overflow-hidden p-8 md:p-12 flex flex-col justify-between text-on-primary">
            <!-- Animated Background / Pattern Layer -->
            <div class="absolute inset-0 islamic-pattern pointer-events-none opacity-40"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary-container to-primary opacity-90 pointer-events-none"></div>
            <div class="relative z-10">
                <!-- Branding -->
                <div class="flex items-center gap-3 mb-16">
                    <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 border border-white/40 shadow-sm">
                        <img class="w-full h-full object-cover" alt="MI Darun Najah Logo" src="/images/logo.jpg">
                    </div>
                    <span class="font-headline-md text-headline-md font-bold tracking-tight">{{ $school_name ?? 'MI Darun Najah' }}</span>
                </div>
                <!-- Welcome Text -->
                <div class="space-y-4">
                    <h1 class="font-headline-lg text-headline-lg leading-tight">Welcome Back, Administrator</h1>
                    <p class="font-body-md text-body-md opacity-80 max-w-xs">
                        Access the management portal to oversee academic operations, student records, and institutional growth.
                    </p>
                </div>
            </div>
        </section>
        
        <!-- Right Side: Login Form -->
        <section class="md:w-7/12 bg-surface-container-lowest p-8 md:p-16 flex flex-col justify-center">
            <div class="max-w-md mx-auto w-full">
                <header class="mb-10">
                    <h2 class="font-display-lg text-display-lg text-primary mb-2">Admin Login</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Please enter your credentials to access the dashboard.</p>
                </header>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="p-4 mb-6 rounded-xl bg-error-container text-error flex items-start gap-3 border border-error/20 font-body-md">
                        <span class="material-symbols-outlined flex-shrink-0 mt-0.5">error</span>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form class="space-y-6" action="/login" method="POST">
                    @csrf
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="font-label-md text-label-md text-on-surface-variant block uppercase tracking-wider" for="email">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">mail</span>
                            </div>
                            <input class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-lowest border border-outline-variant rounded-xl font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none" id="email" name="email" placeholder="admin@darunnajah.edu" required="" type="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label class="font-label-md text-label-md text-on-surface-variant block uppercase tracking-wider" for="password">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">lock</span>
                            </div>
                            <input class="block w-full pl-11 pr-12 py-3.5 bg-surface-container-lowest border border-outline-variant rounded-xl font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none" id="password" name="password" placeholder="••••••••" required="" type="password">
                            <button class="absolute inset-y-0 right-0 pr-4 flex items-center text-outline-variant hover:text-primary transition-colors" type="button" id="toggle-password">
                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </button>
                        </div>
                    </div>
                    <!-- Utilities -->
                    <div class="flex items-center justify-between py-2">
                        <label class="flex items-center cursor-pointer group">
                            <div class="relative">
                                <input class="sr-only peer" type="checkbox" name="remember">
                                <div class="w-5 h-5 border-2 border-outline-variant rounded peer-checked:bg-primary peer-checked:border-primary transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-on-primary text-[14px] scale-0 peer-checked:scale-100 transition-transform" style="font-variation-settings: 'FILL' 1;">check</span>
                                </div>
                            </div>
                            <span class="ml-3 font-label-md text-label-md text-on-surface-variant group-hover:text-primary transition-colors">Remember Me</span>
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <button class="w-full bg-primary hover:bg-primary-container text-on-primary font-headline-md text-headline-md py-4 rounded-xl shadow-sm active:scale-[0.98] transition-all flex items-center justify-center gap-3" type="submit">
                        <span class="">Sign In</span>
                        <span class="material-symbols-outlined">login</span>
                    </button>
                </form>
            </div>
        </section>
    </main>

    <script>
        // Micro-interaction for password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = this.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        });
    </script>
</body>
</html>
