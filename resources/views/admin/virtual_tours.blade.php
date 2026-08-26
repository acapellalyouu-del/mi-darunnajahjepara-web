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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- List/Table Section -->
<div class="lg:col-span-2 flex flex-col gap-6">
@foreach($locations as $location)
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-shadow hover:shadow-[0_4px_20px_rgba(0,0,0,0.05)] {{ $editLocation && $editLocation->id == $location->id ? 'border-l-4 border-l-primary' : '' }}">
<div class="flex justify-between items-start mb-4">
<div class="flex items-center gap-4">
<div class="w-16 h-16 rounded-lg bg-surface-container overflow-hidden flex items-center justify-center relative">
    @if(!empty($location->image_paths) && count($location->image_paths) > 0)
        <img class="w-full h-full object-cover" src="{{ $location->image_paths[0] }}">
    @else
        <span class="material-symbols-outlined text-outline text-3xl">vrpano</span>
    @endif
</div>
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">{{ $location->name }}</h3>
<p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1 mt-1">
    <span class="material-symbols-outlined text-[16px]">{{ $location->is_active ? 'visibility' : 'visibility_off' }}</span> 
    {{ $location->is_active ? 'Active' : 'Hidden' }}
    <span class="mx-2 text-outline-variant">|</span>
    <span class="material-symbols-outlined text-[16px]">{{ $location->media_type === '360_panorama' ? 'vrpano' : 'collections' }}</span> 
    {{ $location->media_type === '360_panorama' ? '360 Panorama' : 'Gallery (' . count($location->image_paths ?? []) . ' images)' }}
</p>
</div>
</div>
<div class="flex gap-2">
<a href="/admin/virtual-tours?edit={{ $location->id }}" class="p-2 text-primary hover:bg-primary-container/20 rounded-lg transition-colors">
<span class="material-symbols-outlined text-[20px]">edit</span>
</a>
<button onclick="openDeleteDialog({{ $location->id }}, '{{ addslashes($location->name) }}')" class="p-2 text-error hover:bg-error-container/20 rounded-lg transition-colors">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</div>
</div>
@endforeach
</div>

<!-- Edit/Add Form Sidebar -->
<div class="lg:col-span-1">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0_4px_20px_rgba(0,0,0,0.05)] sticky top-6">
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

@if($editLocation && !empty($editLocation->image_paths))
    <!-- Checkbox to clear existing images -->
    <div class="flex items-center gap-2 mt-4" id="clear-existing-container">
        <input name="clear_existing" value="1" class="rounded border-outline-variant text-primary focus:ring-primary h-5 w-5" id="clear-existing-checkbox" type="checkbox">
        <label class="font-body-md text-body-md text-on-surface" for="clear-existing-checkbox">Replace existing images</label>
    </div>
    <!-- Thumbnail Preview (Gallery Mode) -->
    <div class="mt-4">
        <p class="font-label-sm text-label-sm text-on-surface-variant mb-2">Current Images ({{ count($editLocation->image_paths) }}):</p>
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
        if (input.files && input.files.length > 0) {
            if (input.files.length === 1) {
                textSpan.textContent = 'Selected: ' + input.files[0].name;
            } else {
                textSpan.textContent = 'Selected ' + input.files.length + ' files';
            }
            textSpan.classList.remove('text-on-surface');
            textSpan.classList.add('text-tertiary');
        } else {
            textSpan.textContent = 'Click to upload files';
            textSpan.classList.remove('text-tertiary');
            textSpan.classList.add('text-on-surface');
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
        }
    });
</script>
</body></html>
