<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Device Simulator - {{ $school_name ?? 'MI Darun Najah' }}</title>
    <link rel="icon" type="image/jpeg" href="/images/logo.jpg"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-mono { font-family: 'JetBrains+Mono', monospace; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        
        /* Smooth Phone Transitions */
        .device-frame {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Custom scrollbar for control bar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col overflow-x-hidden selection:bg-teal-500 selection:text-white">

    <!-- Top Navigation & Control Studio Toolbar -->
    <header class="bg-slate-900/90 backdrop-blur-md border-b border-slate-800/80 sticky top-0 z-50 px-6 py-3 flex flex-col md:flex-row items-center justify-between gap-4 shadow-xl">
        <!-- Brand & Title -->
        <div class="flex items-center gap-3 w-full md:w-auto justify-between md:justify-start">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-teal-600 to-emerald-400 p-0.5 shadow-lg shadow-teal-500/20">
                    <div class="w-full h-full bg-slate-950 rounded-[10px] flex items-center justify-center">
                        <span class="material-symbols-outlined text-teal-400">smartphone</span>
                    </div>
                </div>
                <div>
                    <h1 class="font-bold text-base text-white tracking-tight flex items-center gap-2">
                        <span>Mobile Simulator</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-500/20 text-teal-300 border border-teal-500/30">RESPONSIVE</span>
                    </h1>
                    <p class="text-xs text-slate-400 font-medium">{{ $school_name ?? 'MI Darun Najah' }} Studio</p>
                </div>
            </div>

            <a href="/" class="md:hidden text-xs text-slate-400 hover:text-white flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Web
            </a>
        </div>

        <!-- Quick Target View Preset Tabs -->
        <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar w-full md:w-auto p-1 bg-slate-950/60 rounded-xl border border-slate-800">
            <button onclick="setTarget('/')" id="btn-web" class="preset-btn active-preset px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 bg-teal-600 text-white shadow-md">
                <span class="material-symbols-outlined text-sm">language</span> <span>Web Publik</span>
            </button>
            <button onclick="setTarget('/admin')" id="btn-admin" class="preset-btn px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800">
                <span class="material-symbols-outlined text-sm">dashboard</span> <span>Admin Dashboard</span>
            </button>
            <button onclick="setTarget('/admin/teachers')" id="btn-teachers" class="preset-btn px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800">
                <span class="material-symbols-outlined text-sm">groups</span> <span>Admin Guru</span>
            </button>
            <button onclick="setTarget('/admin/announcements')" id="btn-announcements" class="preset-btn px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800">
                <span class="material-symbols-outlined text-sm">campaign</span> <span>Pengumuman</span>
            </button>
            <button onclick="setTarget('/virtual-tour')" id="btn-vt" class="preset-btn px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800">
                <span class="material-symbols-outlined text-sm">360</span> <span>Virtual Tour</span>
            </button>
        </div>

        <!-- Device Specs & Action Tools -->
        <div class="flex items-center gap-3 w-full md:w-auto justify-end">
            <!-- Device Model Selector -->
            <select id="deviceSelect" onchange="changeDeviceModel()" class="bg-slate-950 text-slate-200 border border-slate-800 rounded-xl px-3 py-1.5 text-xs font-medium focus:ring-2 focus:ring-teal-500 outline-none">
                <option value="iphone15" selected>iPhone 15 Pro (393 × 852)</option>
                <option value="galaxys24">Samsung S24 (412 × 915)</option>
                <option value="iphonese">iPhone SE (375 × 667)</option>
                <option value="ipad">iPad Mini (768 × 1024)</option>
            </select>

            <!-- Orientation Toggle -->
            <button onclick="toggleOrientation()" id="orientationBtn" class="p-2 bg-slate-950 hover:bg-slate-800 text-slate-300 hover:text-white border border-slate-800 rounded-xl transition" title="Rotate Device">
                <span class="material-symbols-outlined text-sm">screen_rotation</span>
            </button>

            <!-- Refresh Frame -->
            <button onclick="reloadFrame()" class="p-2 bg-slate-950 hover:bg-slate-800 text-slate-300 hover:text-white border border-slate-800 rounded-xl transition" title="Reload Frame">
                <span class="material-symbols-outlined text-sm">refresh</span>
            </button>

            <!-- Open in New Tab -->
            <button onclick="openCurrentInNewTab()" class="p-2 bg-teal-600/20 text-teal-400 hover:bg-teal-600 hover:text-white border border-teal-500/30 rounded-xl transition" title="Open Page Directly">
                <span class="material-symbols-outlined text-sm">open_in_new</span>
            </button>
        </div>
    </header>

    <!-- Main Simulator Playground Canvas -->
    <main class="flex-1 flex flex-col items-center justify-center p-6 relative bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950 overflow-y-auto min-h-[calc(100vh-70px)]">

        <!-- Background Studio Grid Pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b15_1px,transparent_1px),linear-gradient(to_bottom,#1e293b15_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>

        <!-- Phone Mockup Container -->
        <div id="deviceContainer" class="device-frame relative bg-slate-900 rounded-[50px] border-[10px] border-slate-800 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.9),0_0_40px_rgba(13,148,136,0.15)] flex flex-col overflow-hidden my-4 ring-1 ring-slate-700/50" style="width: 393px; height: 852px;">
            
            <!-- Smartphone Top Bezel / Status Bar -->
            <div class="bg-slate-950 text-slate-300 px-7 pt-3 pb-1 flex items-center justify-between text-[12px] font-semibold select-none relative z-30 flex-shrink-0">
                <!-- Clock -->
                <span id="currentTime" class="font-mono text-xs">09:41</span>

                <!-- Dynamic Island / Notch -->
                <div class="absolute left-1/2 -translate-x-1/2 top-2.5 w-24 h-5 bg-black rounded-full flex items-center justify-between px-2 shadow-inner border border-slate-800/80">
                    <div class="w-2.5 h-2.5 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center">
                        <div class="w-1 h-1 rounded-full bg-blue-900"></div>
                    </div>
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-950/80 flex items-center justify-center">
                        <div class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse"></div>
                    </div>
                </div>

                <!-- Icons (Cellular, Wifi, Battery) -->
                <div class="flex items-center gap-1.5 text-slate-400">
                    <span class="material-symbols-outlined text-[14px]">signal_cellular_4_bar</span>
                    <span class="material-symbols-outlined text-[14px]">wifi</span>
                    <span class="material-symbols-outlined text-[16px]">battery_full</span>
                </div>
            </div>

            <!-- In-App Mock Address Bar -->
            <div class="bg-slate-950/95 border-b border-slate-800/60 px-4 py-2 flex items-center gap-2 relative z-20 flex-shrink-0">
                <div class="flex items-center gap-1 text-slate-500">
                    <button onclick="historyBack()" class="hover:text-slate-200"><span class="material-symbols-outlined text-sm">arrow_back_ios</span></button>
                    <button onclick="historyForward()" class="hover:text-slate-200"><span class="material-symbols-outlined text-sm">arrow_forward_ios</span></button>
                </div>

                <!-- URL Bar -->
                <div class="flex-1 bg-slate-900 border border-slate-800 rounded-lg px-3 py-1 flex items-center gap-2 text-xs font-mono text-slate-300 shadow-inner overflow-hidden">
                    <span class="material-symbols-outlined text-teal-400 text-xs">lock</span>
                    <input type="text" id="urlInput" class="bg-transparent border-none outline-none w-full text-xs text-slate-200 font-mono" value="http://127.0.0.1:8000/" onkeydown="if(event.key==='Enter') navigateUrl(this.value)">
                </div>

                <button onclick="reloadFrame()" class="text-slate-400 hover:text-white" title="Refresh">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                </button>
            </div>

            <!-- Frame Content (Live Iframe) -->
            <div class="flex-1 relative bg-white overflow-hidden">
                <!-- Loading Indicator Overlay -->
                <div id="frameLoader" class="absolute inset-0 bg-slate-950/90 backdrop-blur-sm flex flex-col items-center justify-center gap-3 z-30 transition-opacity duration-300">
                    <div class="w-10 h-10 border-4 border-teal-500/20 border-t-teal-400 rounded-full animate-spin"></div>
                    <p class="text-xs font-semibold text-teal-300 tracking-wide">Memuat Tampilan Mobile...</p>
                </div>

                <!-- Actual Screen Iframe -->
                <iframe id="previewIframe" src="/" class="w-full h-full border-none" onload="hideLoader()"></iframe>
            </div>

            <!-- Bottom Home Indicator Bar -->
            <div class="bg-slate-950 py-2 flex items-center justify-center relative z-30 flex-shrink-0">
                <div class="w-32 h-1 bg-slate-600 rounded-full"></div>
            </div>
        </div>
    </main>

    <!-- Interactive Controller Script -->
    <script>
        let currentTarget = '/';
        let currentDevice = 'iphone15';
        let isLandscape = false;

        const devices = {
            iphone15: { w: 393, h: 852, name: 'iPhone 15 Pro' },
            galaxys24: { w: 412, h: 915, name: 'Samsung Galaxy S24' },
            iphonese: { w: 375, h: 667, name: 'iPhone SE' },
            ipad: { w: 768, h: 1024, name: 'iPad Mini' }
        };

        function setTarget(path) {
            currentTarget = path;
            const iframe = document.getElementById('previewIframe');
            const urlInput = document.getElementById('urlInput');
            const loader = document.getElementById('frameLoader');

            loader.classList.remove('opacity-0', 'pointer-events-none');
            iframe.src = path;
            urlInput.value = window.location.origin + path;

            // Highlight Active Button
            document.querySelectorAll('.preset-btn').forEach(btn => {
                btn.classList.remove('bg-teal-600', 'text-white', 'shadow-md');
                btn.classList.add('text-slate-300', 'hover:text-white', 'hover:bg-slate-800');
            });

            const btnMap = {
                '/': 'btn-web',
                '/admin': 'btn-admin',
                '/admin/teachers': 'btn-teachers',
                '/admin/announcements': 'btn-announcements',
                '/virtual-tour': 'btn-vt'
            };

            const activeBtnId = btnMap[path];
            if (activeBtnId) {
                const btn = document.getElementById(activeBtnId);
                if (btn) {
                    btn.classList.add('bg-teal-600', 'text-white', 'shadow-md');
                    btn.classList.remove('text-slate-300', 'hover:text-white', 'hover:bg-slate-800');
                }
            }
        }

        function changeDeviceModel() {
            const select = document.getElementById('deviceSelect');
            currentDevice = select.value;
            applyDimensions();
        }

        function toggleOrientation() {
            isLandscape = !isLandscape;
            const btn = document.getElementById('orientationBtn');
            btn.classList.toggle('bg-teal-600/30', isLandscape);
            btn.classList.toggle('text-teal-300', isLandscape);
            applyDimensions();
        }

        function applyDimensions() {
            const container = document.getElementById('deviceContainer');
            const spec = devices[currentDevice] || devices.iphone15;
            
            let width = isLandscape ? spec.h : spec.w;
            let height = isLandscape ? spec.w : spec.h;

            container.style.width = width + 'px';
            container.style.height = height + 'px';
        }

        function reloadFrame() {
            const iframe = document.getElementById('previewIframe');
            const loader = document.getElementById('frameLoader');
            loader.classList.remove('opacity-0', 'pointer-events-none');
            iframe.contentWindow.location.reload();
        }

        function hideLoader() {
            const loader = document.getElementById('frameLoader');
            setTimeout(() => {
                loader.classList.add('opacity-0', 'pointer-events-none');
            }, 300);
        }

        function openCurrentInNewTab() {
            window.open(currentTarget, '_blank');
        }

        function navigateUrl(url) {
            try {
                let parsed = new URL(url);
                setTarget(parsed.pathname);
            } catch(e) {
                if (url.startsWith('/')) {
                    setTarget(url);
                } else {
                    setTarget('/' + url);
                }
            }
        }

        // Live Clock Update
        function updateClock() {
            const now = new Date();
            const hrs = String(now.getHours()).padStart(2, '0');
            const mins = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('currentTime').textContent = `${hrs}:${mins}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
