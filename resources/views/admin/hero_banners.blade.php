<!DOCTYPE html><html class="light" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Manage Hero Banners - MI Darun Najah Admin</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
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
@include('admin.partials.sidebar', ['active' => 'hero_banners'])

<!-- Main Content -->
<main class="flex-1 ml-0 md:ml-64 p-margin-mobile md:p-margin-desktop w-full max-w-container-max mx-auto overflow-x-hidden">
<!-- Header Section -->
<header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
<div>
<h1 class="font-headline-lg text-headline-lg text-primary mb-2">Manage Hero Banners</h1>
<p class="text-on-surface-variant font-body-md text-body-md">Schedule and configure the primary promotional banners for the home page.</p>
</div>
@if($editBanner)
<a href="/admin/hero-banners" class="bg-primary text-on-primary px-6 py-3 rounded font-label-md text-label-md hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm flex items-center gap-2">
<span class="material-symbols-outlined">add</span>
    Create New Banner
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

<!-- Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Add/Edit Form Sidebar -->
<div class="lg:col-span-4 bg-surface-container-lowest rounded-lg border border-outline-variant shadow-sm p-6 flex flex-col gap-6 h-fit">
<h3 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant pb-4">
    {{ $editBanner ? 'Edit Banner' : 'New Banner' }}
</h3>
<form action="/admin/hero-banners" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
    @csrf
    @if($editBanner)
        <input type="hidden" name="id" value="{{ $editBanner->id }}">
    @endif
<!-- Title -->
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Banner Title</label>
<input name="title" class="w-full rounded border-outline-variant focus:border-primary focus:ring-primary bg-surface-bright text-on-surface font-body-md text-body-md" placeholder="e.g. Open Enrollment 2024" type="text" value="{{ old('title', $editBanner->title ?? '') }}">
</div>
<!-- Subtitle -->
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Subtitle / Description</label>
<textarea name="subtitle" class="w-full rounded border-outline-variant focus:border-primary focus:ring-primary bg-surface-bright text-on-surface font-body-md text-body-md" placeholder="Short description text..." rows="3">{{ old('subtitle', $editBanner->subtitle ?? '') }}</textarea>
</div>
<!-- Image Upload -->
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Background Image</label>
@if($editBanner && $editBanner->image_path)
    <div class="mb-2">
        <img class="w-full h-24 object-cover rounded-lg border border-outline-variant" src="{{ $editBanner->image_path }}">
        <p class="text-[10px] text-on-surface-variant mt-1">Current Image</p>
    </div>
@endif
<div class="relative border-2 border-dashed border-outline-variant rounded-lg p-6 flex flex-col items-center justify-center text-center hover:bg-surface-container-low transition-colors cursor-pointer bg-surface-bright" onclick="document.getElementById('file-upload-input').click()">
    <span class="material-symbols-outlined text-outline text-3xl mb-2">cloud_upload</span>
    <p class="font-label-md text-label-md text-primary" id="upload-status-text">Click to upload image</p>
    <p class="font-label-sm text-label-sm text-on-surface-variant mt-1">PNG, JPG or JPEG (max. 10MB)</p>
    <input id="file-upload-input" type="file" name="image" class="hidden" accept="image/*" onchange="updateUploadStatus(this)">
</div>
</div>
<!-- CTA -->
<div class="grid grid-cols-2 gap-4">
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">CTA Label</label>
<input name="button_text" class="w-full rounded border-outline-variant focus:border-primary focus:ring-primary bg-surface-bright text-on-surface font-body-md text-body-md" placeholder="e.g. Learn More" type="text" value="{{ old('button_text', $editBanner->button_text ?? '') }}">
</div>
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">CTA Link</label>
<input name="button_link" class="w-full rounded border-outline-variant focus:border-primary focus:ring-primary bg-surface-bright text-on-surface font-body-md text-body-md" placeholder="https://" type="text" value="{{ old('button_link', $editBanner->button_link ?? '') }}">
</div>
</div>
<!-- Scheduling -->
<div class="grid grid-cols-2 gap-4">
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Start Date</label>
<input name="start_date" class="w-full rounded border-outline-variant focus:border-primary focus:ring-primary bg-surface-bright text-on-surface font-body-md text-body-md" type="date" value="{{ old('start_date', $editBanner && $editBanner->start_date ? \Carbon\Carbon::parse($editBanner->start_date)->format('Y-m-d') : '') }}">
</div>
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">End Date</label>
<input name="end_date" class="w-full rounded border-outline-variant focus:border-primary focus:ring-primary bg-surface-bright text-on-surface font-body-md text-body-md" type="date" value="{{ old('end_date', $editBanner && $editBanner->end_date ? \Carbon\Carbon::parse($editBanner->end_date)->format('Y-m-d') : '') }}">
</div>
</div>
<div class="flex items-center gap-2 mt-2">
<input name="is_active" value="1" class="rounded border-outline-variant text-primary focus:ring-primary h-5 w-5" id="status-active" type="checkbox" {{ old('is_active', $editBanner ? $editBanner->is_active : true) ? 'checked' : '' }}>
<label class="font-body-md text-body-md text-on-surface" for="status-active">Set as Active</label>
</div>
<div class="pt-4 border-t border-outline-variant flex justify-end gap-3 mt-4">
@if($editBanner)
    <a href="/admin/hero-banners" class="px-4 py-2 border border-outline text-on-surface rounded font-label-md text-label-md hover:bg-surface-container-low transition-colors text-center">Cancel</a>
@endif
<button class="px-4 py-2 bg-primary text-on-primary rounded font-label-md text-label-md hover:bg-primary-container hover:text-on-primary-container transition-colors" type="submit">Save Banner</button>
</div>
</form>
</div>
<!-- Data Table Area -->
<div class="lg:col-span-8 flex flex-col gap-6">
<!-- Table -->
<div class="bg-surface-container-lowest rounded-lg border border-outline-variant shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container text-on-surface font-label-md text-label-md border-b border-outline-variant">
<th class="p-4 font-semibold w-16">Preview</th>
<th class="p-4 font-semibold">Banner Details</th>
<th class="p-4 font-semibold">Schedule</th>
<th class="p-4 font-semibold">Status</th>
<th class="p-4 font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
@foreach($banners as $banner)
<tr class="hover:bg-surface-container-low transition-colors">
<td class="p-4">
<div class="w-16 h-10 bg-surface-container-high rounded overflow-hidden relative">
<img class="w-full h-full object-cover" src="{{ $banner->image_path }}">
</div>
</td>
<td class="p-4">
<p class="font-label-md text-label-md text-on-surface">{{ $banner->title ?? 'Untitled Banner' }}</p>
<p class="font-label-sm text-label-sm text-on-surface-variant truncate w-48">{{ $banner->subtitle ?? 'No subtitle' }}</p>
</td>
<td class="p-4">
<p class="font-body-md text-body-md text-on-surface">
    {{ $banner->start_date ? \Carbon\Carbon::parse($banner->start_date)->format('M d, Y') : 'Always' }}
</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">
    {{ $banner->end_date ? 'to ' . \Carbon\Carbon::parse($banner->end_date)->format('M d, Y') : 'Always' }}
</p>
</td>
<td class="p-4">
    @php
        $now = now();
        $isExpired = $banner->end_date && \Carbon\Carbon::parse($banner->end_date)->isPast();
        $isScheduled = $banner->start_date && \Carbon\Carbon::parse($banner->start_date)->isFuture();
        $isActive = $banner->is_active && !$isExpired && !$isScheduled;
    @endphp
    @if(!$banner->is_active)
        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
            <span class="w-2 h-2 rounded-full bg-outline"></span>
            Inactive
        </span>
    @elseif($isExpired)
        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
            <span class="w-2 h-2 rounded-full bg-outline"></span>
            Expired
        </span>
    @elseif($isScheduled)
        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-secondary-container/30 text-on-secondary-container font-label-sm text-label-sm">
            <span class="w-2 h-2 rounded-full bg-secondary"></span>
            Scheduled
        </span>
    @else
        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-tertiary-container/20 text-tertiary font-label-sm text-label-sm">
            <span class="w-2 h-2 rounded-full bg-tertiary"></span>
            Active
        </span>
    @endif
</td>
<td class="p-4 text-right">
<a href="/admin/hero-banners?edit={{ $banner->id }}" class="text-on-surface-variant hover:text-primary transition-colors p-1 inline-block"><span class="material-symbols-outlined text-[20px]">edit</span></a>
<button onclick="openDeleteDialog({{ $banner->id }}, '{{ addslashes($banner->title ?? 'Untitled Banner') }}')" class="text-on-surface-variant hover:text-error transition-colors p-1"><span class="material-symbols-outlined text-[20px]">delete</span></button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</main>

<!-- Delete Confirmation Dialog -->
<div id="delete-dialog" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-[100] hidden">
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-2xl p-6 w-full max-w-md mx-4 animate-scale-up">
        <h4 class="font-headline-md text-headline-md text-error mb-2 flex items-center gap-2">
            <span class="material-symbols-outlined text-2xl">warning</span>
            Delete Banner
        </h4>
        <p class="font-body-md text-on-surface-variant mb-6">
            Are you sure you want to delete <strong id="banner-title-to-delete" class="text-on-surface"></strong>? This action cannot be undone.
        </p>
        <div class="flex justify-end gap-4">
            <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="closeDeleteDialog()">Cancel</button>
            <button class="bg-error text-on-error px-8 py-2.5 rounded-lg font-label-md hover:bg-error/95 shadow-lg shadow-error/20" onclick="confirmDelete()">Delete Banner</button>
        </div>
    </div>
</div>

<script>
    let bannerIdToDelete = null;

    function openDeleteDialog(id, title) {
        bannerIdToDelete = id;
        document.getElementById('banner-title-to-delete').textContent = title;
        document.getElementById('delete-dialog').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteDialog() {
        document.getElementById('delete-dialog').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function confirmDelete() {
        if (!bannerIdToDelete) return;
        
        const btn = document.querySelector('#delete-dialog button:last-child');
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin">progress_activity</span> Deleting...';
        
        const form = document.createElement('form');
        form.action = "{{ url('/admin/hero-banners') }}/" + bannerIdToDelete;
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

    function updateUploadStatus(input) {
        const textSpan = document.getElementById('upload-status-text');
        if (input.files && input.files.length > 0) {
            textSpan.textContent = 'Selected: ' + input.files[0].name;
            textSpan.classList.remove('text-primary');
            textSpan.classList.add('text-tertiary');
        } else {
            textSpan.textContent = 'Click to upload image';
            textSpan.classList.remove('text-tertiary');
            textSpan.classList.add('text-primary');
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

    // Close modals on ESC
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeDeleteDialog();
        }
    });
</script>
</body></html>
