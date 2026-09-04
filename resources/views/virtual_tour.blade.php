<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Virtual Tour 360° | {{ $settings['school_name'] ?? 'MI Darun Najah' }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { user-select: none; -webkit-user-select: none; overflow: hidden; }
        .glass-panel {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        .hotspot-pulse {
            animation: pulse-ring 2s infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 12px rgba(59, 130, 246, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        .custom-scrollbar::-webkit-scrollbar {
            height: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-slate-950 text-white font-[Work_Sans] h-screen w-screen relative overflow-hidden">

    <!-- Canvas WebGL for 360 Panorama View -->
    <canvas id="glCanvas" class="absolute inset-0 w-full h-full cursor-grab active:cursor-grabbing z-0"></canvas>

    <!-- Hotspots HTML Layer (3D projected circular markers) -->
    <div id="hotspotContainer" class="absolute inset-0 pointer-events-none z-10 overflow-hidden"></div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="absolute inset-0 z-30 bg-slate-950/80 backdrop-blur-md flex flex-col items-center justify-center transition-opacity duration-300 pointer-events-none opacity-0 hidden">
        <div class="w-10 h-10 border-3 border-blue-500/30 border-t-blue-500 rounded-full animate-spin mb-3"></div>
        <p id="loadingText" class="text-xs font-semibold text-slate-300 tracking-wider">Memuat Ruangan 360° HD...</p>
    </div>

    <!-- Standard Gallery Container (fallback) -->
    <div id="galleryContainer" class="absolute inset-0 z-0 bg-slate-900 hidden flex items-center justify-center p-8">
        <img id="galleryImg" class="max-h-full max-w-full rounded-2xl object-contain shadow-2xl" src="" alt="Gallery Preview">
    </div>

    <!-- HUD Header Bar -->
    <header class="absolute top-4 left-4 right-4 z-20 flex flex-wrap items-center justify-between gap-3 pointer-events-none">
        <!-- Back Button & Location Title -->
        <div class="glass-panel rounded-2xl px-5 py-3 flex items-center gap-4 shadow-xl pointer-events-auto">
            <a href="/" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors border border-white/20" title="Kembali ke Beranda">
                <span class="material-symbols-outlined text-xl">arrow_back</span>
            </a>
            <div>
                <h1 class="text-base font-bold tracking-wide text-white leading-tight flex items-center gap-2">
                    <span>Virtual School Tour 360°</span>
                    <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2 py-0.5 rounded-full border border-emerald-500/30 font-semibold uppercase">HD Quality</span>
                </h1>
                <p id="roomTitle" class="text-xs text-blue-400 font-medium">{{ $virtualTours->first()->name ?? 'Virtual Tour' }}</p>
            </div>
        </div>

        <!-- Action Tools -->
        <div class="glass-panel rounded-2xl p-2 flex items-center gap-2 shadow-xl pointer-events-auto">
            <button id="btnAutoRotate" class="px-3 py-2 rounded-xl text-xs font-semibold bg-blue-600 text-white transition flex items-center gap-1.5 border border-slate-700/50">
                <span class="material-symbols-outlined text-sm">sync</span> <span>Auto Rotate</span>
            </button>

            <button id="btnGyro" class="px-3 py-2 rounded-xl text-xs font-semibold bg-slate-800/80 hover:bg-slate-700 text-slate-200 transition flex items-center gap-1.5 border border-slate-700/50">
                <span class="material-symbols-outlined text-sm">smartphone</span> <span>Sensors</span>
            </button>

            <button id="btnFullscreen" class="px-3 py-2 rounded-xl text-xs font-semibold bg-blue-600 hover:bg-blue-500 text-white transition flex items-center gap-1.5 shadow-md shadow-blue-600/30">
                <span class="material-symbols-outlined text-sm">fullscreen</span> <span>Fullscreen</span>
            </button>
        </div>
    </header>

    <!-- Drag & Scroll Hint -->
    <div id="dragHint" class="absolute inset-x-0 top-24 z-10 flex justify-center pointer-events-none transition-opacity duration-1000">
        <div class="glass-panel px-4 py-2 rounded-full text-xs text-slate-300 flex items-center gap-2 shadow-lg animate-bounce">
            <span class="material-symbols-outlined text-sm text-blue-400">touch_app</span>
            <span>Geser layar untuk melihat 360° | Scroll untuk zoom</span>
        </div>
    </div>

    <!-- Location Description Overlay (Left Panel) -->
    <div class="absolute top-24 left-4 z-20 pointer-events-none max-w-sm hidden md:block">
        <div class="glass-panel rounded-2xl p-4 shadow-xl pointer-events-auto">
            <h3 id="locationName" class="text-sm font-bold text-white mb-1">{{ $virtualTours->first()->name ?? 'Virtual Tour' }}</h3>
            <p id="locationDesc" class="text-xs text-slate-300 leading-relaxed">
                {{ $virtualTours->first()->description ?? 'Jelajahi lingkungan sekolah secara digital 360°.' }}
            </p>
        </div>
    </div>

    <!-- HUD Bottom Center Bar: Perfectly Centered Category Tabs & Room Switcher -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 pointer-events-auto w-full max-w-3xl px-4 flex flex-col items-center justify-center text-center">
        <!-- Category Filter Tabs -->
        <div class="glass-panel rounded-xl p-1.5 flex items-center justify-center gap-1.5 shadow-xl text-xs font-bold mb-2">
            <button data-cat="all" class="cat-btn px-3 py-1.5 rounded-lg transition bg-blue-600 text-white">Semua ({{ count($virtualTours) }})</button>
            <button data-cat="fasilitas" class="cat-btn px-3 py-1.5 rounded-lg transition text-slate-300 hover:text-white hover:bg-slate-800">Fasilitas Utama</button>
            <button data-cat="kelas13" class="cat-btn px-3 py-1.5 rounded-lg transition text-slate-300 hover:text-white hover:bg-slate-800">Kelas 1 - 3</button>
            <button data-cat="kelas46" class="cat-btn px-3 py-1.5 rounded-lg transition text-slate-300 hover:text-white hover:bg-slate-800">Kelas 4 - 6</button>
        </div>

        <!-- Room Buttons Container (Centered Horizontal Slider) -->
        <div class="glass-panel rounded-2xl p-2 flex items-center justify-center gap-2 shadow-2xl overflow-x-auto custom-scrollbar w-full max-w-full" id="locationSwitcher">
            @foreach($virtualTours as $index => $vt)
                @php
                    $imgPath = '';
                    if (!empty($vt->image_paths)) {
                        $imgPath = is_array($vt->image_paths) ? ($vt->image_paths[0] ?? '') : $vt->image_paths;
                    }
                    $resolvedUrl = filter_var($imgPath, FILTER_VALIDATE_URL) ? $imgPath : (Str::startsWith($imgPath, ['/storage', 'storage']) ? asset($imgPath) : asset('storage/' . ltrim($imgPath, '/')));
                    
                    // Categorization
                    $category = 'fasilitas';
                    $lowerName = strtolower($vt->name);
                    if (str_contains($lowerName, 'kelas 1') || str_contains($lowerName, 'kelas 2') || str_contains($lowerName, 'kelas 3')) {
                        $category = 'kelas13';
                    } elseif (str_contains($lowerName, 'kelas 4') || str_contains($lowerName, 'kelas 5') || str_contains($lowerName, 'kelas 6')) {
                        $category = 'kelas46';
                    }
                @endphp
                <button data-id="{{ $vt->id }}" 
                        data-name="{{ $vt->name }}" 
                        data-desc="{{ $vt->description }}" 
                        data-type="{{ $vt->media_type }}" 
                        data-url="{{ $resolvedUrl }}"
                        data-cat="{{ $category }}"
                        class="vt-btn px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap {{ $index === 0 ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-slate-800/80 text-slate-300 hover:bg-slate-700 border border-slate-700/50' }}">
                    <span class="material-symbols-outlined text-sm">{{ $vt->media_type === '360_panorama' ? '360' : 'collections' }}</span>
                    {{ $vt->name }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- HUD Bottom Right: Interactive Denah Sekolah (Mini-Map) -->
    <div class="absolute bottom-6 right-6 z-20 pointer-events-auto hidden md:block">
        <div class="glass-panel rounded-2xl p-3 shadow-2xl relative w-48 h-48 flex flex-col justify-between">
            <div class="flex items-center justify-between text-[11px] font-bold text-slate-400 mb-1">
                <span>DENAH SEKOLAH</span>
                <span id="compassVal" class="text-blue-400">0° N</span>
            </div>
            <!-- Map Graphic -->
            <div class="relative w-full h-36 bg-slate-900/90 rounded-xl border border-slate-800 overflow-hidden flex items-center justify-center">
                <!-- Floorplan SVG -->
                <svg class="absolute inset-0 w-full h-full p-2 opacity-40" viewBox="0 0 100 100">
                    <rect x="10" y="40" width="35" height="40" fill="none" stroke="#94a3b8" stroke-width="2" rx="2" />
                    <rect x="55" y="40" width="35" height="40" fill="none" stroke="#94a3b8" stroke-width="2" rx="2" />
                    <rect x="30" y="10" width="40" height="25" fill="none" stroke="#94a3b8" stroke-width="2" rx="2" />
                    <line x1="45" y1="35" x2="45" y2="40" stroke="#64748b" stroke-width="2" />
                    <line x1="55" y1="35" x2="55" y2="40" stroke="#64748b" stroke-width="2" />
                </svg>

                <!-- Map Room Nodes -->
                <button data-room-name="Ruang Kepala Sekolah" class="map-node absolute w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow-md flex items-center justify-center text-[9px] z-10" style="left: 45%; top: 48%;" title="Ruang Kepala Sekolah"></button>
                <button data-room-name="Aula MI Darun Najah" class="map-node absolute w-4 h-4 rounded-full bg-slate-600 hover:bg-blue-400 border border-slate-300 flex items-center justify-center text-[9px]" style="left: 46%; top: 20%;" title="Aula MI"></button>
                <button data-room-name="Ruang Kelas 1A" class="map-node absolute w-4 h-4 rounded-full bg-slate-600 hover:bg-blue-400 border border-slate-300 flex items-center justify-center text-[9px]" style="left: 20%; top: 60%;" title="Kelas 1A"></button>
                <button data-room-name="Ruang Kelas 6A" class="map-node absolute w-4 h-4 rounded-full bg-slate-600 hover:bg-blue-400 border border-slate-300 flex items-center justify-center text-[9px]" style="left: 72%; top: 60%;" title="Kelas 6A"></button>

                <!-- Vision Cone Radar -->
                <div id="visionCone" class="absolute pointer-events-none transition-all duration-75" style="left: 45%; top: 48%; width: 60px; height: 60px; margin-left: -30px; margin-top: -30px;">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <path d="M 50 50 L 25 10 A 50 50 0 0 1 75 10 Z" fill="rgba(59, 130, 246, 0.35)" stroke="rgba(96, 165, 250, 0.8)" stroke-width="1.5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Modal Popup -->
    <div id="infoModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300 pointer-events-auto">
        <div class="glass-panel max-w-md w-full rounded-3xl p-6 shadow-2xl border border-slate-700 relative transform scale-95 transition-transform duration-300" id="modalCard">
            <button id="btnCloseModal" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white flex items-center justify-center text-sm font-bold border border-slate-700">✕</button>
            <div class="flex items-center gap-3 mb-4">
                <span class="material-symbols-outlined text-3xl text-blue-400">info</span>
                <div>
                    <h2 id="modalTitle" class="text-lg font-bold text-white leading-tight">Detail Informasi</h2>
                    <p id="modalCategory" class="text-xs text-blue-400 font-medium">Fasilitas Madrasah</p>
                </div>
            </div>
            <p id="modalBody" class="text-sm text-slate-300 leading-relaxed mb-6">
                Penjelasan lengkap mengenai titik area sekolah ini.
            </p>
            <div class="flex justify-end">
                <button id="btnConfirmModal" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold shadow-lg shadow-blue-600/30">
                    Mengerti
                </button>
            </div>
        </div>
    </div>

    <!-- WebGL & Interactive Engine -->
    <script>
        const toursData = @json($virtualTours);

        // Predefined Hotspots mapped per room name
        const HOTSPOTS_MAP = {
            'Ruang Kepala Sekolah': [
                { yaw: 0.5, pitch: -0.05, type: 'nav', targetRoom: 'Aula MI Darun Najah', label: 'Ke Aula MI', icon: 'meeting_room' },
                { yaw: -0.6, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 1A', label: 'Ke Kelas 1A', icon: 'meeting_room' },
                { yaw: 0.0, pitch: 0.05, type: 'info', title: 'Meja Utama Kepala Sekolah', desc: 'Pusat kepemimpinan dan manajerial madrasah MI Darun Najah Srobyong.', icon: 'info' }
            ],
            'Aula MI Darun Najah': [
                { yaw: 3.1, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kepala Sekolah', label: 'Ke Ruang Kepsek', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 2A', label: 'Ke Kelas 2A', icon: 'meeting_room' },
                { yaw: 0.0, pitch: 0.05, type: 'info', title: 'Panggung Serbaguna', desc: 'Digunakan untuk kegiatan seni, pertemuan wali murid, dan pentas apresiasi siswa.', icon: 'info' }
            ],
            'Ruang Kelas 1A': [
                { yaw: 3.1, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kepala Sekolah', label: 'Ke Ruang Kepsek', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 1B', label: 'Ke Kelas 1B', icon: 'meeting_room' }
            ],
            'Ruang Kelas 1B': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 1A', label: 'Ke Kelas 1A', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 2A', label: 'Ke Kelas 2A', icon: 'meeting_room' }
            ],
            'Ruang Kelas 2A': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 1B', label: 'Ke Kelas 1B', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 3A', label: 'Ke Kelas 3A', icon: 'meeting_room' }
            ],
            'Ruang Kelas 3A': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 2A', label: 'Ke Kelas 2A', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 3C', label: 'Ke Kelas 3C', icon: 'meeting_room' }
            ],
            'Ruang Kelas 3C': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 3A', label: 'Ke Kelas 3A', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 4A', label: 'Ke Kelas 4A', icon: 'meeting_room' }
            ],
            'Ruang Kelas 4A': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 3C', label: 'Ke Kelas 3C', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 5A', label: 'Ke Kelas 5A', icon: 'meeting_room' }
            ],
            'Ruang Kelas 5A': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 4A', label: 'Ke Kelas 4A', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 5B', label: 'Ke Kelas 5B', icon: 'meeting_room' }
            ],
            'Ruang Kelas 5B': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 5A', label: 'Ke Kelas 5A', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 6A', label: 'Ke Kelas 6A', icon: 'meeting_room' }
            ],
            'Ruang Kelas 6A': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 5B', label: 'Ke Kelas 5B', icon: 'meeting_room' },
                { yaw: 0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 6B', label: 'Ke Kelas 6B', icon: 'meeting_room' }
            ],
            'Ruang Kelas 6B': [
                { yaw: -0.7, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kelas 6A', label: 'Ke Kelas 6A', icon: 'meeting_room' },
                { yaw: 3.1, pitch: -0.05, type: 'nav', targetRoom: 'Ruang Kepala Sekolah', label: 'Ke Ruang Kepsek', icon: 'meeting_room' }
            ]
        };

        const canvasGL = document.getElementById('glCanvas');
        const gl = canvasGL.getContext('webgl', { alpha: false, antialias: true, powerPreference: 'high-performance' }) || canvasGL.getContext('experimental-webgl');
        const galleryContainer = document.getElementById('galleryContainer');
        const galleryImg = document.getElementById('galleryImg');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const loadingText = document.getElementById('loadingText');
        const hotspotContainer = document.getElementById('hotspotContainer');

        let currentRoomName = 'Ruang Kepala Sekolah';

        // WebGL Shader setup
        const vsSource = `
            attribute vec2 a_position;
            varying vec2 v_uv;
            void main() {
                v_uv = (a_position + 1.0) * 0.5;
                gl_Position = vec4(a_position, 0.0, 1.0);
            }
        `;

        const fsSource = `
            precision mediump float;
            varying vec2 v_uv;
            uniform sampler2D u_texture;
            uniform float u_yaw;
            uniform float u_pitch;
            uniform float u_fov;
            uniform float u_aspect;

            #define PI 3.14159265359

            void main() {
                vec2 ndc = (v_uv - 0.5) * 2.0;
                float tanHalfFov = tan(u_fov * 0.5);
                vec3 ray = normalize(vec3(ndc.x * u_aspect * tanHalfFov, ndc.y * tanHalfFov, 1.0));

                float cp = cos(u_pitch);
                float sp = sin(u_pitch);
                mat3 rotX = mat3(
                    1.0, 0.0, 0.0,
                    0.0, cp, -sp,
                    0.0, sp, cp
                );

                float cy = cos(u_yaw);
                float sy = sin(u_yaw);
                mat3 rotY = mat3(
                    cy, 0.0, sy,
                    0.0, 1.0, 0.0,
                    -sy, 0.0, cy
                );

                vec3 dir = rotY * (rotX * ray);

                float longitude = atan(dir.x, dir.z);
                float latitude = asin(clamp(dir.y, -1.0, 1.0));

                vec2 texCoord = vec2(
                    longitude / (2.0 * PI) + 0.5,
                    latitude / PI + 0.5
                );

                gl_FragColor = texture2D(u_texture, texCoord);
            }
        `;

        function compileShader(gl, src, type) {
            const shader = gl.createShader(type);
            gl.shaderSource(shader, src);
            gl.compileShader(shader);
            if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
                console.error(gl.getShaderInfoLog(shader));
                gl.deleteShader(shader);
                return null;
            }
            return shader;
        }

        const vertShader = compileShader(gl, vsSource, gl.VERTEX_SHADER);
        const fragShader = compileShader(gl, fsSource, gl.FRAGMENT_SHADER);
        const program = gl.createProgram();
        gl.attachShader(program, vertShader);
        gl.attachShader(program, fragShader);
        gl.linkProgram(program);
        gl.useProgram(program);

        const positionBuffer = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([
            -1, -1,  1, -1, -1,  1,
            -1,  1,  1, -1,  1,  1
        ]), gl.STATIC_DRAW);

        const aPosition = gl.getAttribLocation(program, 'a_position');
        gl.enableVertexAttribArray(aPosition);
        gl.vertexAttribPointer(aPosition, 2, gl.FLOAT, false, 0, 0);

        const uYawLoc = gl.getUniformLocation(program, 'u_yaw');
        const uPitchLoc = gl.getUniformLocation(program, 'u_pitch');
        const uFovLoc = gl.getUniformLocation(program, 'u_fov');
        const uAspectLoc = gl.getUniformLocation(program, 'u_aspect');

        let glTexture = null;

        function createGLTexture(imgSource) {
            if (glTexture) {
                gl.deleteTexture(glTexture);
            }
            glTexture = gl.createTexture();
            gl.bindTexture(gl.TEXTURE_2D, glTexture);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
            gl.pixelStorei(gl.UNPACK_FLIP_Y_WEBGL, true);
            gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, gl.RGBA, gl.UNSIGNED_BYTE, imgSource);
        }

        let state = {
            yaw: 0.0,
            pitch: 0.0,
            fov: 75 * Math.PI / 180,
            isDragging: false,
            lastMouseX: 0,
            lastMouseY: 0,
            autoRotate: true,
            autoRotateSpeed: 0.0012,
            useGyro: false
        };

        function showLoading(show, roomName = '') {
            if (show) {
                loadingText.textContent = `Memuat ${roomName}...`;
                loadingOverlay.classList.remove('hidden');
                setTimeout(() => loadingOverlay.classList.remove('opacity-0'), 10);
            } else {
                loadingOverlay.classList.add('opacity-0');
                setTimeout(() => loadingOverlay.classList.add('hidden'), 300);
            }
        }

        function renderHotspots() {
            hotspotContainer.innerHTML = '';
            const hotspots = HOTSPOTS_MAP[currentRoomName];
            if (!hotspots) return;

            const width = canvasGL.clientWidth;
            const height = canvasGL.clientHeight;
            const aspect = width / height;

            const cy = Math.cos(state.yaw);
            const sy = Math.sin(state.yaw);
            const cp = Math.cos(state.pitch);
            const sp = Math.sin(state.pitch);

            hotspots.forEach(hs => {
                const hx = Math.sin(hs.yaw) * Math.cos(hs.pitch);
                const hy = Math.sin(hs.pitch);
                const hz = Math.cos(hs.yaw) * Math.cos(hs.pitch);

                const v1_x = cy * hx - sy * hz;
                const v1_y = hy;
                const v1_z = sy * hx + cy * hz;

                const cam_x = v1_x;
                const cam_y = cp * v1_y + sp * v1_z;
                const cam_z = -sp * v1_y + cp * v1_z;

                if (cam_z > 0.08) {
                    const tanHalfFov = Math.tan(state.fov / 2);
                    const ndc_x = cam_x / (cam_z * aspect * tanHalfFov);
                    const ndc_y = cam_y / (cam_z * tanHalfFov);

                    if (ndc_x >= -1.1 && ndc_x <= 1.1 && ndc_y >= -1.1 && ndc_y <= 1.1) {
                        const screenX = (ndc_x * 0.5 + 0.5) * width;
                        const screenY = (0.5 - ndc_y * 0.5) * height;

                        const elem = document.createElement('div');
                        elem.className = 'absolute pointer-events-auto transform -translate-x-1/2 -translate-y-1/2 cursor-pointer transition-transform hover:scale-110 flex flex-col items-center group';
                        elem.style.left = `${screenX}px`;
                        elem.style.top = `${screenY}px`;

                        if (hs.type === 'nav') {
                            elem.innerHTML = `
                                <div class="w-10 h-10 rounded-full bg-blue-600/90 text-white flex items-center justify-center shadow-lg border-2 border-white/80 hotspot-pulse">
                                    <span class="material-symbols-outlined text-lg">${hs.icon || 'meeting_room'}</span>
                                </div>
                                <div class="mt-1.5 px-3 py-1 rounded-lg glass-panel text-[11px] font-bold text-white whitespace-nowrap shadow-xl border border-slate-700/80 group-hover:bg-blue-600 transition">
                                    ${hs.label}
                                </div>
                            `;
                            elem.onclick = () => {
                                const targetBtn = document.querySelector(`.vt-btn[data-name="${hs.targetRoom}"]`);
                                if (targetBtn) selectLocation(targetBtn);
                            };
                        } else {
                            elem.innerHTML = `
                                <div class="w-10 h-10 rounded-full bg-amber-500/90 text-slate-950 flex items-center justify-center shadow-lg border-2 border-white/80 animate-bounce">
                                    <span class="material-symbols-outlined text-lg">${hs.icon || 'info'}</span>
                                </div>
                                <div class="mt-1.5 px-3 py-1 rounded-lg glass-panel text-[11px] font-bold text-amber-300 whitespace-nowrap shadow-xl border border-slate-700/80 group-hover:bg-amber-500 group-hover:text-slate-950 transition">
                                    ${hs.title}
                                </div>
                            `;
                            elem.onclick = () => openInfoModal(hs.title, hs.desc);
                        }

                        hotspotContainer.appendChild(elem);
                    }
                }
            });
        }

        function openInfoModal(title, desc) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalBody').textContent = desc;

            const modal = document.getElementById('infoModal');
            const card = document.getElementById('modalCard');

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                card.classList.remove('scale-95');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('infoModal');
            const card = document.getElementById('modalCard');
            modal.classList.add('opacity-0');
            card.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        document.getElementById('btnCloseModal').onclick = closeModal;
        document.getElementById('btnConfirmModal').onclick = closeModal;

        function selectLocation(btn) {
            const name = btn.dataset.name;
            const desc = btn.dataset.desc;
            const type = btn.dataset.type;
            const url = btn.dataset.url;

            currentRoomName = name;

            document.getElementById('roomTitle').textContent = name;
            document.getElementById('locationName').textContent = name;
            document.getElementById('locationDesc').textContent = desc || 'Lokasi Virtual Tour MI Darun Najah.';

            document.querySelectorAll('.vt-btn').forEach(b => {
                if (b === btn) {
                    b.className = 'vt-btn px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap bg-blue-600 text-white shadow-lg shadow-blue-600/30';
                } else {
                    b.className = 'vt-btn px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap bg-slate-800/80 text-slate-300 hover:bg-slate-700 border border-slate-700/50';
                }
            });

            // Update Map Nodes
            document.querySelectorAll('.map-node').forEach(node => {
                if (node.dataset.roomName === name) {
                    node.className = 'map-node absolute w-5 h-5 rounded-full bg-blue-500 border-2 border-white shadow-md flex items-center justify-center text-[9px] z-10';
                } else {
                    node.className = 'map-node absolute w-4 h-4 rounded-full bg-slate-600 hover:bg-blue-400 border border-slate-300 flex items-center justify-center text-[9px]';
                }
            });

            if (type === '360_panorama') {
                galleryContainer.classList.add('hidden');
                canvasGL.classList.remove('hidden');
                showLoading(true, name);

                const img = new Image();
                img.crossOrigin = 'anonymous';
                img.onload = () => {
                    createGLTexture(img);
                    showLoading(false);
                };
                img.onerror = () => {
                    showLoading(false);
                };
                img.src = url;
            } else {
                canvasGL.classList.add('hidden');
                galleryContainer.classList.remove('hidden');
                galleryImg.src = url;
            }

            state.yaw = 0.0;
            state.pitch = 0.0;
        }

        document.querySelectorAll('.vt-btn').forEach(btn => {
            btn.addEventListener('click', () => selectLocation(btn));
        });

        // Map Node Click Teleport
        document.querySelectorAll('.map-node').forEach(node => {
            node.addEventListener('click', (e) => {
                const roomName = e.currentTarget.dataset.roomName;
                const targetBtn = document.querySelector(`.vt-btn[data-name="${roomName}"]`);
                if (targetBtn) selectLocation(targetBtn);
            });
        });

        // Category Filter Logic
        document.querySelectorAll('.cat-btn').forEach(catBtn => {
            catBtn.addEventListener('click', (e) => {
                const selectedCat = e.currentTarget.dataset.cat;
                document.querySelectorAll('.cat-btn').forEach(b => {
                    if (b === e.currentTarget) {
                        b.className = 'cat-btn px-3 py-1.5 rounded-lg transition bg-blue-600 text-white';
                    } else {
                        b.className = 'cat-btn px-3 py-1.5 rounded-lg transition text-slate-300 hover:text-white hover:bg-slate-800';
                    }
                });

                document.querySelectorAll('.vt-btn').forEach(vtBtn => {
                    if (selectedCat === 'all' || vtBtn.dataset.cat === selectedCat) {
                        vtBtn.style.display = 'inline-flex';
                    } else {
                        vtBtn.style.display = 'none';
                    }
                });
            });
        });

        // Controls & Interaction
        canvasGL.addEventListener('mousedown', (e) => {
            state.isDragging = true;
            state.lastMouseX = e.clientX;
            state.lastMouseY = e.clientY;
        });

        window.addEventListener('mouseup', () => state.isDragging = false);

        window.addEventListener('mousemove', (e) => {
            if (!state.isDragging) return;
            const dx = e.clientX - state.lastMouseX;
            const dy = e.clientY - state.lastMouseY;

            const speed = state.fov * 0.0015;
            state.yaw -= dx * speed;
            state.pitch += dy * speed;

            const maxPitch = 85 * Math.PI / 180;
            state.pitch = Math.max(-maxPitch, Math.min(maxPitch, state.pitch));

            state.lastMouseX = e.clientX;
            state.lastMouseY = e.clientY;
        });

        // Touch support
        canvasGL.addEventListener('touchstart', (e) => {
            if (e.touches.length === 1) {
                state.isDragging = true;
                state.lastMouseX = e.touches[0].clientX;
                state.lastMouseY = e.touches[0].clientY;
            }
        });

        canvasGL.addEventListener('touchend', () => state.isDragging = false);

        canvasGL.addEventListener('touchmove', (e) => {
            if (!state.isDragging || e.touches.length !== 1) return;
            const dx = e.touches[0].clientX - state.lastMouseX;
            const dy = e.touches[0].clientY - state.lastMouseY;

            const speed = state.fov * 0.0015;
            state.yaw -= dx * speed;
            state.pitch += dy * speed;

            const maxPitch = 85 * Math.PI / 180;
            state.pitch = Math.max(-maxPitch, Math.min(maxPitch, state.pitch));

            state.lastMouseX = e.touches[0].clientX;
            state.lastMouseY = e.touches[0].clientY;
        });

        canvasGL.addEventListener('wheel', (e) => {
            state.fov += e.deltaY * 0.001;
            const minFov = 30 * Math.PI / 180;
            const maxFov = 100 * Math.PI / 180;
            state.fov = Math.max(minFov, Math.min(maxFov, state.fov));
        });

        // Auto Rotate
        document.getElementById('btnAutoRotate').onclick = () => {
            state.autoRotate = !state.autoRotate;
            const btn = document.getElementById('btnAutoRotate');
            if (state.autoRotate) {
                btn.classList.add('bg-blue-600', 'text-white');
                btn.classList.remove('bg-slate-800/80');
            } else {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-slate-800/80');
            }
        };

        // Gyro Motion
        document.getElementById('btnGyro').onclick = () => {
            if (typeof DeviceOrientationEvent !== 'undefined' && typeof DeviceOrientationEvent.requestPermission === 'function') {
                DeviceOrientationEvent.requestPermission().then(response => {
                    if (response === 'granted') {
                        state.useGyro = !state.useGyro;
                        alert(state.useGyro ? 'Sensor Gyroscope Aktif! Gerakkan HP Anda.' : 'Sensor Gyroscope dimatikan.');
                    }
                });
            } else {
                state.useGyro = !state.useGyro;
                alert(state.useGyro ? 'Sensor Gyroscope / Motion Aktif.' : 'Sensor Gyroscope dimatikan.');
            }
        };

        window.addEventListener('deviceorientation', (e) => {
            if (state.useGyro && e.alpha !== null) {
                state.yaw = (e.alpha * Math.PI) / 180;
                state.pitch = (e.beta * Math.PI) / 180 - Math.PI / 2;
            }
        });

        // Fullscreen
        document.getElementById('btnFullscreen').onclick = () => {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) document.exitFullscreen();
            }
        };

        function resize() {
            const width = window.innerWidth;
            const height = window.innerHeight;
            if (canvasGL.width !== width || canvasGL.height !== height) {
                canvasGL.width = width;
                canvasGL.height = height;
                gl.viewport(0, 0, width, height);
            }
        }

        setTimeout(() => {
            const hint = document.getElementById('dragHint');
            if (hint) hint.classList.add('opacity-0');
        }, 4000);

        function renderLoop() {
            resize();

            if (state.autoRotate && !state.isDragging) {
                state.yaw += state.autoRotateSpeed;
            }

            if (glTexture) {
                gl.useProgram(program);
                gl.uniform1f(uYawLoc, state.yaw);
                gl.uniform1f(uPitchLoc, state.pitch);
                gl.uniform1f(uFovLoc, state.fov);
                gl.uniform1f(uAspectLoc, canvasGL.width / canvasGL.height);

                gl.drawArrays(gl.TRIANGLES, 0, 6);

                renderHotspots();

                // Update Mini Map Vision Cone & Compass
                const visionCone = document.getElementById('visionCone');
                if (visionCone) {
                    const degrees = (state.yaw * 180 / Math.PI) % 360;
                    visionCone.style.transform = `rotate(${-degrees}deg)`;
                    const compassVal = document.getElementById('compassVal');
                    if (compassVal) {
                        const normDeg = (Math.round(-degrees) % 360 + 360) % 360;
                        compassVal.textContent = `${normDeg}° N`;
                    }
                }
            }

            requestAnimationFrame(renderLoop);
        }

        // Initialize with first button
        const firstBtn = document.querySelector('.vt-btn');
        if (firstBtn) {
            selectLocation(firstBtn);
        }

        requestAnimationFrame(renderLoop);
    </script>
</body>
</html>
