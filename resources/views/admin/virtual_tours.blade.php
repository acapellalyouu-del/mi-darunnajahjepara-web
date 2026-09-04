<!DOCTYPE html><html class="light" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Manage Virtual Tour - MI Darun Najah Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400..800&amp;family=Work+Sans:wght@400..700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<style>
        body { font-family: 'Work Sans', sans-serif; }
        .material-symbols-outlined {
          font-variation-settings:
          'FILL' 0,
          'wght' 400,
          'GRAD' 0,
          'opsz' 24;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #bec9c8;
            border-radius: 9999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #004c4c;
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
                      "headline-lg-mobile": [
                              "Manrope"
                      ],
                      "headline-lg": [
                              "Manrope"
                      ],
                      "label-sm": [
                              "Work Sans"
                      ],
                      "body-md": [
                              "Work Sans"
                      ],
                      "body-lg": [
                              "Work Sans"
                      ],
                      "label-md": [
                              "Work Sans"
                      ],
                      "display-lg": [
                              "Manrope"
                      ],
                      "headline-md": [
                              "Manrope"
                      ]
              },
              "fontSize": {
                      "headline-lg-mobile": [
                              "28px",
                              {
                                      "lineHeight": "1.3",
                                      "fontWeight": "700"
                              }
                      ],
                      "headline-lg": [
                              "32px",
                              {
                                      "lineHeight": "1.3",
                                      "fontWeight": "700"
                              }
                      ],
                      "label-sm": [
                              "12px",
                              {
                                      "lineHeight": "1.2",
                                      "fontWeight": "500"
                              }
                      ],
                      "body-md": [
                              "16px",
                              {
                                      "lineHeight": "1.6",
                                      "fontWeight": "400"
                              }
                      ],
                      "body-lg": [
                              "18px",
                              {
                                      "lineHeight": "1.6",
                                      "fontWeight": "400"
                              }
                      ],
                      "label-md": [
                              "14px",
                              {
                                      "lineHeight": "1.2",
                                      "letterSpacing": "0.05em",
                                      "fontWeight": "600"
                              }
                      ],
                      "display-lg": [
                              "48px",
                              {
                                      "lineHeight": "1.2",
                                      "letterSpacing": "-0.02em",
                                      "fontWeight": "800"
                              }
                      ],
                      "headline-md": [
                              "24px",
                              {
                                      "lineHeight": "1.4",
                                      "fontWeight": "600"
                              }
                      ]
              }
       },
          },
        }
      </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">
@include('admin.partials.sidebar', ['active' => 'virtual_tours'])

<!-- Main Content Area -->
<main class="flex-1 md:ml-64 p-margin-mobile md:p-margin-desktop bg-surface-bright min-h-screen">
<!-- Header -->
<header class="flex justify-between items-center mb-8">
<div>
<h2 class="font-headline-lg text-headline-lg text-primary">Manage Virtual Tour</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Add, edit, and organize 360 panoramas and gallery images for the school virtual tour.</p>
</div>
@if($editLocation)
<a href="/admin/virtual-tours" class="bg-primary text-on-primary font-label-md text-label-md px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-primary/90 transition-colors shadow-sm">
<span class="material-symbols-outlined text-[20px]">add</span>
    Add New Location
</a>
@endif
</header>

@if(session('success'))
<div class="mb-6 p-4 bg-tertiary-container/20 text-tertiary border border-tertiary/20 rounded-xl flex items-center gap-3">
    <span class="material-symbols-outlined">check_circle</span>
    <span class="font-body-md">{{ session('success') }}</span>
</div>
@endif

@if($errors->any())
<div class="mb-6 p-4 bg-error-container text-error border border-error/20 rounded-xl flex items-start gap-3">
    <span class="material-symbols-outlined flex-shrink-0">error</span>
    <div class="flex flex-col">
        @foreach($errors->all() as $error)
            <span class="font-body-md">{{ $error }}</span>
        @endforeach
    </div>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter items-start">
<!-- List/Table Section -->
<div class="lg:col-span-2 flex flex-col gap-6">
@foreach($locations as $location)
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-shadow hover:shadow-[0_4px_20px_rgba(0,0,0,0.05)] {{ $editLocation && $editLocation->id == $location->id ? 'border-l-4 border-l-primary' : '' }}">
<div class="flex justify-between items-start mb-4">
<div class="flex items-center gap-4">
<div class="w-16 h-16 rounded-lg bg-surface-container overflow-hidden flex items-center justify-center relative flex-shrink-0">
    @if(!empty($location->image_paths) && count($location->image_paths) > 0)
        <img class="w-full h-full object-cover" src="{{ $location->image_paths[0] }}">
    @else
        <span class="material-symbols-outlined text-outline text-3xl">vrpano</span>
    @endif
</div>
<div>
<div class="flex items-center gap-2 flex-wrap">
    <h3 class="font-headline-md text-headline-md text-on-surface">{{ $location->name }}</h3>
    @if($loop->first || $location->order === 1)
        <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-2.5 py-0.5 rounded-full flex items-center gap-1 border border-amber-300">
            <span class="material-symbols-outlined text-[13px]">push_pin</span> PREVIEW UTAMA WEB
        </span>
    @endif
</div>
<p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1 mt-1">
    <span class="material-symbols-outlined text-[16px]">{{ $location->is_active ? 'visibility' : 'visibility_off' }}</span> 
    {{ $location->is_active ? 'Active' : 'Hidden' }}
    <span class="mx-2 text-outline-variant">|</span>
    <span class="material-symbols-outlined text-[16px]">{{ $location->media_type === '360_panorama' ? 'vrpano' : 'collections' }}</span> 
    {{ $location->media_type === '360_panorama' ? '360 Panorama' : 'Gallery (' . count($location->image_paths ?? []) . ' images)' }}
</p>
</div>
</div>
<div class="flex gap-2 items-center flex-wrap">
@if(!empty($location->image_paths) && count($location->image_paths) > 0)
    @php
        $previewUrl = filter_var($location->image_paths[0], FILTER_VALIDATE_URL) ? $location->image_paths[0] : (Str::startsWith($location->image_paths[0], ['/storage', 'storage']) ? asset($location->image_paths[0]) : asset('storage/' . ltrim($location->image_paths[0], '/')));
    @endphp
    <button onclick="openPreviewModal('{{ addslashes($location->name) }}', '{{ $previewUrl }}', '{{ $location->media_type }}')" type="button" class="px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary/20 rounded-lg transition-colors flex items-center gap-1 font-label-md text-xs font-semibold">
        <span class="material-symbols-outlined text-[18px]">{{ $location->media_type === '360_panorama' ? '360' : 'visibility' }}</span>
        Preview
    </button>
@endif

@if(!$loop->first && $location->order !== 1)
    <form action="/admin/virtual-tours/{{ $location->id }}/pin" method="POST" class="inline">
        @csrf
        <button type="submit" title="Set sebagai Gambar Preview / Header Utama Website" class="px-3 py-1.5 bg-amber-500/10 text-amber-800 hover:bg-amber-500/20 rounded-lg transition-colors flex items-center gap-1 font-label-md text-xs font-bold border border-amber-300">
            <span class="material-symbols-outlined text-[18px]">push_pin</span>
            Set Utama
        </button>
    </form>
@endif

<a href="/admin/virtual-tours?edit={{ $location->id }}" class="p-2 text-primary hover:bg-primary-container/20 rounded-lg transition-colors" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</a>
<button onclick="openDeleteDialog({{ $location->id }}, '{{ addslashes($location->name) }}')" class="p-2 text-error hover:bg-error-container/20 rounded-lg transition-colors" title="Hapus">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</div>
</div>
@endforeach
</div>

<!-- Edit/Add Form Sidebar (Fixed Sticky + Independent Scroll) -->
<div class="lg:col-span-1 sticky top-6">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0_4px_20px_rgba(0,0,0,0.05)] max-h-[calc(100vh-3rem)] overflow-y-auto custom-scrollbar">
<h3 class="font-headline-md text-headline-md text-primary mb-6 border-b border-outline-variant pb-4">
    {{ $editLocation ? 'Edit Location' : 'New Location' }}
</h3>
<form action="/admin/virtual-tours" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
    @csrf
    @if($editLocation)
        <input type="hidden" name="id" value="{{ $editLocation->id }}">
    @endif
<!-- Location Name -->
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Location Name</label>
<input name="name" class="w-full rounded-lg border-outline-variant bg-surface-bright text-on-surface font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors py-2 px-3" type="text" value="{{ old('name', $editLocation->name ?? '') }}" required>
</div>
<!-- Description -->
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Description (Optional)</label>
<textarea name="description" class="w-full rounded-lg border-outline-variant bg-surface-bright text-on-surface font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-colors py-2 px-3" rows="3">{{ old('description', $editLocation->description ?? '') }}</textarea>
</div>
<!-- Media Type Toggle -->
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Media Type</label>
<div class="flex bg-surface-container rounded-lg p-1">
<button id="btn-panorama" class="flex-1 py-2 font-label-md text-label-md rounded-md transition-all duration-150" type="button" onclick="setMediaType('360_panorama')">360 Panorama</button>
<button id="btn-gallery" class="flex-1 py-2 font-label-md text-label-md rounded-md transition-all duration-150" type="button" onclick="setMediaType('gallery')">Standard Gallery</button>
</div>
<input type="hidden" name="media_type" id="media-type-input" value="{{ old('media_type', $editLocation->media_type ?? '360_panorama') }}">
</div>
<!-- Image Upload Area -->
<div class="mt-2">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-2" id="upload-label">Upload Images</label>
<div class="border-2 border-dashed border-outline-variant rounded-xl p-8 flex flex-col items-center justify-center text-center hover:border-primary hover:bg-surface-container-low transition-colors cursor-pointer" onclick="document.getElementById('images-file-input').click()">
<span class="material-symbols-outlined text-4xl text-primary mb-2">cloud_upload</span>
<p class="font-label-md text-label-md text-on-surface" id="upload-status-text">Click to upload files</p>
<p class="font-body-md text-sm text-on-surface-variant mt-1" id="upload-dimensions-text">PNG, JPG or JPEG (max. 10MB)</p>
<input id="images-file-input" type="file" name="images[]" class="hidden" multiple onchange="updateUploadStatus(this)">
</div>

<!-- Dynamic Live Image Preview Container -->
<div id="new-image-preview-box" class="mt-4 hidden border border-primary/20 bg-primary/5 rounded-xl p-3">
    <p class="font-label-sm text-xs font-bold text-primary mb-2 flex items-center justify-between">
        <span>Gambar Baru Yang Dipilih:</span>
    </p>
    <div id="preview-thumbnails-grid" class="grid grid-cols-4 gap-2"></div>
</div>

@if($editLocation && !empty($editLocation->image_paths))
    <!-- Checkbox to clear existing images -->
    <div class="flex items-center gap-2 mt-4" id="clear-existing-container">
        <input name="clear_existing" value="1" class="rounded border-outline-variant text-primary focus:ring-primary h-5 w-5" id="clear-existing-checkbox" type="checkbox">
        <label class="font-body-md text-body-md text-on-surface" for="clear-existing-checkbox">Replace existing images completely</label>
    </div>
    <!-- Thumbnail Preview (Gallery Mode) -->
    <div class="mt-4" id="existing-images-container">
        <p class="font-label-sm text-label-sm text-on-surface-variant mb-2">Gambar Sebelumnya ({{ count($editLocation->image_paths) }}):</p>
        <div class="grid grid-cols-4 gap-2">
            @foreach($editLocation->image_paths as $imgPath)
            <div class="aspect-square rounded-lg bg-surface-container relative group overflow-hidden border border-outline-variant">
                <img class="w-full h-full object-cover" src="{{ $imgPath }}">
            </div>
            @endforeach
        </div>
    </div>
@endif
</div>
<!-- Status -->
<div class="mt-2">
<label class="flex items-center gap-3 cursor-pointer">
<input name="is_active" value="1" class="rounded border-outline-variant text-primary focus:ring-primary h-5 w-5" type="checkbox" {{ old('is_active', $editLocation ? $editLocation->is_active : true) ? 'checked' : '' }}>
<span class="font-body-md text-body-md text-on-surface">Visible on Website</span>
</label>
</div>
<!-- Actions -->
<div class="flex gap-3 mt-4 pt-4 border-t border-outline-variant">
@if($editLocation)
    <a href="/admin/virtual-tours" class="flex-1 py-3 px-4 bg-surface-container-high text-on-surface font-label-md text-label-md rounded-lg hover:bg-surface-container transition-colors text-center">Cancel</a>
@endif
<button class="flex-1 py-3 px-4 bg-primary text-on-primary font-label-md text-label-md rounded-lg hover:bg-primary/90 transition-colors shadow-sm" type="submit">Save Changes</button>
</div>
</form>
</div>
</div>
</div>
</main>

<!-- Delete Confirmation Dialog -->
<div id="delete-dialog" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-[100] hidden">
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-2xl p-6 w-full max-w-md mx-4 animate-scale-up">
        <h4 class="font-headline-md text-headline-md text-error mb-2 flex items-center gap-2">
            <span class="material-symbols-outlined text-2xl">warning</span>
            Delete Location
        </h4>
        <p class="font-body-md text-on-surface-variant mb-6">
            Are you sure you want to delete <strong id="location-name-to-delete" class="text-on-surface"></strong>? This action cannot be undone.
        </p>
        <div class="flex justify-end gap-4">
            <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="closeDeleteDialog()">Cancel</button>
            <button class="bg-error text-on-error px-8 py-2.5 rounded-lg font-label-md hover:bg-error/95 shadow-lg shadow-error/20" onclick="confirmDelete()">Delete Location</button>
        </div>
    </div>
</div>

<script>
    let locationIdToDelete = null;

    function openDeleteDialog(id, name) {
        locationIdToDelete = id;
        document.getElementById('location-name-to-delete').textContent = name;
        document.getElementById('delete-dialog').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteDialog() {
        document.getElementById('delete-dialog').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function confirmDelete() {
        if (!locationIdToDelete) return;
        
        const btn = document.querySelector('#delete-dialog button:last-child');
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin">progress_activity</span> Deleting...';
        
        const form = document.createElement('form');
        form.action = "{{ url('/admin/virtual-tours') }}/" + locationIdToDelete;
        form.method = 'POST';
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        
        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        document.body.appendChild(form);
        
        form.submit();
    }

    function setMediaType(type) {
        document.getElementById('media-type-input').value = type;
        const btnPano = document.getElementById('btn-panorama');
        const btnGallery = document.getElementById('btn-gallery');
        const uploadLabel = document.getElementById('upload-label');
        const clearExisting = document.getElementById('clear-existing-container');
        const fileInput = document.getElementById('images-file-input');

        if (type === '360_panorama') {
            btnPano.className = 'flex-1 py-2 font-label-md text-label-md rounded-md bg-surface-container-lowest text-primary shadow-sm';
            btnGallery.className = 'flex-1 py-2 font-label-md text-label-md rounded-md text-on-surface-variant hover:text-primary transition-colors';
            uploadLabel.textContent = 'Upload 360 Panorama Image';
            if (clearExisting) clearExisting.style.display = 'none';
            fileInput.removeAttribute('multiple');
        } else {
            btnGallery.className = 'flex-1 py-2 font-label-md text-label-md rounded-md bg-surface-container-lowest text-primary shadow-sm';
            btnPano.className = 'flex-1 py-2 font-label-md text-label-md rounded-md text-on-surface-variant hover:text-primary transition-colors';
            uploadLabel.textContent = 'Upload Gallery Images';
            if (clearExisting) clearExisting.style.display = 'flex';
            fileInput.setAttribute('multiple', 'multiple');
        }
    }

    function updateUploadStatus(input) {
        const textSpan = document.getElementById('upload-status-text');
        const previewBox = document.getElementById('new-image-preview-box');
        const previewGrid = document.getElementById('preview-thumbnails-grid');
        
        if (previewGrid) previewGrid.innerHTML = '';

        if (input.files && input.files.length > 0) {
            if (input.files.length === 1) {
                textSpan.textContent = 'Selected: ' + input.files[0].name;
            } else {
                textSpan.textContent = 'Selected ' + input.files.length + ' new files';
            }
            textSpan.classList.remove('text-on-surface');
            textSpan.classList.add('text-tertiary');

            if (previewBox && previewGrid) {
                previewBox.classList.remove('hidden');
                Array.from(input.files).forEach((file, index) => {
                    const objectUrl = URL.createObjectURL(file);
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'aspect-square rounded-lg bg-surface-container relative group overflow-hidden border-2 border-primary shadow-sm';
                    itemDiv.innerHTML = `
                        <img class="w-full h-full object-cover" src="${objectUrl}">
                        <span class="absolute top-1 left-1 bg-primary text-on-primary text-[9px] font-bold px-1.5 py-0.5 rounded shadow">BARU #${index+1}</span>
                    `;
                    previewGrid.appendChild(itemDiv);
                });
            }
        } else {
            textSpan.textContent = 'Click to upload files';
            textSpan.classList.remove('text-tertiary');
            textSpan.classList.add('text-on-surface');
            if (previewBox) previewBox.classList.add('hidden');
        }
    }

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

    // Initialize media type view
    document.addEventListener('DOMContentLoaded', () => {
        setMediaType(document.getElementById('media-type-input').value);
    });

    // Close modals on ESC
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeDeleteDialog();
            closePreviewModal();
        }
    });

    // ---------------------------------------------------
    // WebGL 360 Live Preview Modal Logic
    // ---------------------------------------------------
    let prevGl = null;
    let prevProgram = null;
    let prevGlTexture = null;
    let uYawLoc, uPitchLoc, uFovLoc, uAspectLoc;
    let prevAnimId = null;

    let pState = {
        yaw: 0, pitch: 0, fov: 75 * Math.PI / 180, isDragging: false, lastX: 0, lastY: 0
    };

    function initPreviewWebGL() {
        const canvas = document.getElementById('previewCanvas');
        prevGl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
        if (!prevGl) return;

        const vsSource = `
            attribute vec2 a_position;
            varying vec2 v_uv;
            void main() { v_uv = (a_position + 1.0) * 0.5; gl_Position = vec4(a_position, 0.0, 1.0); }
        `;
        const fsSource = `
            precision mediump float;
            varying vec2 v_uv;
            uniform sampler2D u_texture;
            uniform float u_yaw; uniform float u_pitch; uniform float u_fov; uniform float u_aspect;
            #define PI 3.14159265359
            void main() {
                vec2 ndc = (v_uv - 0.5) * 2.0;
                float tanHalfFov = tan(u_fov * 0.5);
                vec3 ray = normalize(vec3(ndc.x * u_aspect * tanHalfFov, ndc.y * tanHalfFov, 1.0));
                float cp = cos(u_pitch), sp = sin(u_pitch);
                mat3 rotX = mat3(1.0, 0.0, 0.0, 0.0, cp, -sp, 0.0, sp, cp);
                float cy = cos(u_yaw), sy = sin(u_yaw);
                mat3 rotY = mat3(cy, 0.0, sy, 0.0, 1.0, 0.0, -sy, 0.0, cy);
                vec3 dir = rotY * (rotX * ray);
                float longitude = atan(dir.x, dir.z);
                float latitude = asin(clamp(dir.y, -1.0, 1.0));
                vec2 texCoord = vec2(longitude / (2.0 * PI) + 0.5, latitude / PI + 0.5);
                gl_FragColor = texture2D(u_texture, texCoord);
            }
        `;

        function createShader(gl, src, type) {
            const s = gl.createShader(type);
            gl.shaderSource(s, src); gl.compileShader(s); return s;
        }

        const vs = createShader(prevGl, vsSource, prevGl.VERTEX_SHADER);
        const fs = createShader(prevGl, fsSource, prevGl.FRAGMENT_SHADER);
        prevProgram = prevGl.createProgram();
        prevGl.attachShader(prevProgram, vs);
        prevGl.attachShader(prevProgram, fs);
        prevGl.linkProgram(prevProgram);

        const posBuffer = prevGl.createBuffer();
        prevGl.bindBuffer(prevGl.ARRAY_BUFFER, posBuffer);
        prevGl.bufferData(prevGl.ARRAY_BUFFER, new Float32Array([-1,-1, 1,-1, -1,1, -1,1, 1,-1, 1,1]), prevGl.STATIC_DRAW);

        const aPos = prevGl.getAttribLocation(prevProgram, 'a_position');
        prevGl.enableVertexAttribArray(aPos);
        prevGl.vertexAttribPointer(aPos, 2, prevGl.FLOAT, false, 0, 0);

        uYawLoc = prevGl.getUniformLocation(prevProgram, 'u_yaw');
        uPitchLoc = prevGl.getUniformLocation(prevProgram, 'u_pitch');
        uFovLoc = prevGl.getUniformLocation(prevProgram, 'u_fov');
        uAspectLoc = prevGl.getUniformLocation(prevProgram, 'u_aspect');

        prevGlTexture = prevGl.createTexture();
        prevGl.bindTexture(prevGl.TEXTURE_2D, prevGlTexture);
        prevGl.texParameteri(prevGl.TEXTURE_2D, prevGl.TEXTURE_WRAP_S, prevGl.CLAMP_TO_EDGE);
        prevGl.texParameteri(prevGl.TEXTURE_2D, prevGl.TEXTURE_WRAP_T, prevGl.CLAMP_TO_EDGE);
        prevGl.texParameteri(prevGl.TEXTURE_2D, prevGl.TEXTURE_MIN_FILTER, prevGl.LINEAR);
        prevGl.texParameteri(prevGl.TEXTURE_2D, prevGl.TEXTURE_MAG_FILTER, prevGl.LINEAR);

        canvas.onmousedown = (e) => { pState.isDragging = true; pState.lastX = e.clientX; pState.lastY = e.clientY; };
        window.onmouseup = () => pState.isDragging = false;
        window.onmousemove = (e) => {
            if (!pState.isDragging) return;
            const dx = e.clientX - pState.lastX;
            const dy = e.clientY - pState.lastY;
            pState.yaw -= dx * 0.002;
            pState.pitch += dy * 0.002;
            pState.lastX = e.clientX;
            pState.lastY = e.clientY;
        };
        canvas.onwheel = (e) => {
            pState.fov += e.deltaY * 0.001;
            pState.fov = Math.max(30*Math.PI/180, Math.min(100*Math.PI/180, pState.fov));
        };
    }

    function openPreviewModal(name, url, type) {
        document.getElementById('preview-modal-title-text').textContent = 'Preview 360°: ' + name;
        const modal = document.getElementById('preview-modal');
        const canvas = document.getElementById('previewCanvas');
        const gal = document.getElementById('previewGallery');
        modal.classList.remove('hidden');

        if (type === '360_panorama') {
            gal.classList.add('hidden');
            canvas.classList.remove('hidden');

            if (!prevGl) initPreviewWebGL();

            const img = new Image();
            img.crossOrigin = 'anonymous';
            img.onload = () => {
                prevGl.bindTexture(prevGl.TEXTURE_2D, prevGlTexture);
                prevGl.pixelStorei(prevGl.UNPACK_FLIP_Y_WEBGL, true);
                prevGl.texImage2D(prevGl.TEXTURE_2D, 0, prevGl.RGBA, prevGl.RGBA, prevGl.UNSIGNED_BYTE, img);
            };
            img.src = url;

            pState.yaw = 0; pState.pitch = 0;

            function renderPreview() {
                if (modal.classList.contains('hidden')) return;
                canvas.width = canvas.clientWidth;
                canvas.height = canvas.clientHeight;
                prevGl.viewport(0, 0, canvas.width, canvas.height);

                pState.yaw += 0.0015; // Slow auto rotate in preview modal

                prevGl.useProgram(prevProgram);
                prevGl.uniform1f(uYawLoc, pState.yaw);
                prevGl.uniform1f(uPitchLoc, pState.pitch);
                prevGl.uniform1f(uFovLoc, pState.fov);
                prevGl.uniform1f(uAspectLoc, canvas.width / canvas.height);

                prevGl.drawArrays(prevGl.TRIANGLES, 0, 6);
                prevAnimId = requestAnimationFrame(renderPreview);
            }
            if (prevAnimId) cancelAnimationFrame(prevAnimId);
            renderPreview();
        } else {
            canvas.classList.add('hidden');
            gal.classList.remove('hidden');
            document.getElementById('previewGalleryImg').src = url;
        }
    }

    function closePreviewModal() {
        document.getElementById('preview-modal').classList.add('hidden');
        if (prevAnimId) cancelAnimationFrame(prevAnimId);
    }
</script>

<!-- 360 Live Preview Modal -->
<div id="preview-modal" class="fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-[150] hidden">
    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-2xl p-4 w-full max-w-4xl h-[80vh] flex flex-col relative mx-4">
        <div class="flex items-center justify-between pb-3 border-b border-outline-variant px-2">
            <h4 class="font-headline-md text-base font-bold text-primary flex items-center gap-2" id="preview-modal-title">
                <span class="material-symbols-outlined text-primary text-xl">360</span>
                <span id="preview-modal-title-text">Preview Location</span>
            </h4>
            <button onclick="closePreviewModal()" class="w-8 h-8 rounded-full bg-surface-container text-on-surface-variant hover:text-on-surface flex items-center justify-center font-bold">✕</button>
        </div>
        <div class="flex-1 relative mt-3 rounded-xl overflow-hidden bg-slate-950">
            <canvas id="previewCanvas" class="w-full h-full cursor-grab active:cursor-grabbing"></canvas>
            <div id="previewGallery" class="hidden inset-0 absolute flex items-center justify-center p-4">
                <img id="previewGalleryImg" src="" class="max-h-full max-w-full object-contain rounded-lg">
            </div>
            <div class="absolute bottom-3 left-1/2 -translate-x-1/2 bg-slate-900/80 backdrop-blur-md border border-slate-700 px-4 py-1.5 rounded-full text-xs text-slate-300 pointer-events-none flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-blue-400">touch_app</span>
                <span>Geser mouse untuk memutar panorama 360°</span>
            </div>
        </div>
    </div>
</div>
</body></html>

