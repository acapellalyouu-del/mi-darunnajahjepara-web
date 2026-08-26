<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Manage Events - MI Darun Najah Admin</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
            display: inline-block;
            vertical-align: middle;
        }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #bec9c8; border-radius: 10px; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">
@include('admin.partials.sidebar', ['active' => 'events'])

<!-- Main Content Area -->
<main class="ml-64 min-h-screen flex flex-col">
    <!-- Top Bar -->
    <header class="h-20 px-8 flex justify-between items-center bg-surface border-b border-outline-variant">
        <div class="flex flex-col">
            <h2 class="font-headline-md text-headline-md text-primary font-bold">Event Management</h2>
            <nav class="flex text-xs text-on-surface-variant/60 gap-1">
                <a class="hover:text-primary" href="/admin">Dashboard</a>
                <span>/</span>
                <span class="text-on-surface-variant">Events</span>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative group">
                <input class="pl-10 pr-4 py-2 w-64 bg-surface-container-lowest border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-full font-body-md text-body-md transition-all" id="events-search" placeholder="Search events..." type="text" oninput="filterEvents()"/>
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant group-focus-within:text-primary">search</span>
            </div>
            <button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg flex items-center gap-2 font-label-md text-label-md shadow-sm hover:opacity-90 active:scale-95 transition-all" onclick="openAddModal()">
                <span class="material-symbols-outlined">add</span>
                Add New Event
            </button>
        </div>
    </header>

    <!-- Content Area -->
    <div class="flex-1 p-8 overflow-y-auto custom-scrollbar">
        <!-- Alert Messages -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-tertiary-container/20 border border-tertiary text-primary rounded-xl flex items-center gap-3">
                <span class="material-symbols-outlined text-tertiary">check_circle</span>
                <p class="font-label-md">{{ session('success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-error-container/20 border border-error text-error rounded-xl flex flex-col gap-2">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-error">error</span>
                        <p class="font-label-md">{{ $error }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Bento Grid Layout for Events -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter" id="events-grid">
            @forelse ($events as $event)
            <div class="event-card group bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden hover:shadow-lg transition-all duration-300" data-title="{{ strtolower($event->title) }}" data-location="{{ strtolower($event->location) }}">
                <div class="h-48 relative overflow-hidden bg-surface-container">
                    @if($event->image_path)
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ filter_var($event->image_path, FILTER_VALIDATE_URL) ? $event->image_path : (Str::startsWith($event->image_path, ['/storage', 'storage']) ? asset($event->image_path) : asset('storage/' . $event->image_path)) }}">
                    @else
                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-4xl">event</span>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 left-4 flex gap-2">
                        @if($event->is_featured)
                            <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-label-sm font-bold rounded-full shadow-sm">
                                Featured
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-6 flex flex-col justify-between h-56">
                    <div>
                        <h3 class="font-headline-md text-primary font-bold line-clamp-1 mb-2">{{ $event->title }}</h3>
                        <p class="text-sm text-on-surface-variant line-clamp-3 mb-4">{{ $event->description }}</p>
                    </div>

                    <div>
                        <div class="border-t border-outline-variant/60 pt-4 text-xs text-on-surface-variant space-y-1.5 mb-3">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-primary">calendar_month</span>
                                <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }} WIB</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-primary">location_on</span>
                                <span>{{ $event->location }}</span>
                            </div>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button onclick="openEditModal({{ json_encode($event) }})" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button onclick="openDeleteDialog({{ $event->id }}, '{{ addslashes($event->title) }}')" class="p-2 text-error hover:bg-error-container/20 rounded-lg transition-colors" title="Delete">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center text-on-surface-variant bg-surface-container-low border border-outline-variant border-dashed rounded-2xl flex flex-col items-center justify-center gap-3">
                <span class="material-symbols-outlined text-5xl opacity-40">event_busy</span>
                <p class="font-headline-md">Belum ada agenda kegiatan.</p>
                <button class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-md" onclick="openAddModal()">Add Event</button>
            </div>
            @endforelse
        </div>
    </div>
</main>

<!-- Delete Confirmation Modal -->
<div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4" id="delete-dialog">
    <div class="fixed inset-0 bg-on-background/40 backdrop-blur-sm"></div>
    <div class="relative bg-surface-container-lowest w-full max-w-md p-8 rounded-2xl shadow-2xl border border-outline-variant animate-in fade-in zoom-in duration-200">
        <div class="w-16 h-16 bg-error-container rounded-full flex items-center justify-center text-error mx-auto mb-6">
            <span class="material-symbols-outlined text-3xl">warning</span>
        </div>
        <h3 class="text-center font-headline-md text-headline-md font-bold mb-2">Delete Event?</h3>
        <p class="text-center text-on-surface-variant font-body-md text-body-md mb-8">
            Are you sure you want to delete <strong class="text-on-surface" id="event-title-to-delete">Event Title</strong>? This action cannot be undone.
        </p>
        <div class="flex gap-4">
            <button class="flex-1 py-3 px-4 border border-outline-variant text-on-surface-variant rounded-xl font-label-md text-label-md hover:bg-surface-container transition-colors" onclick="closeDeleteDialog()">
                Cancel
            </button>
            <button class="flex-1 py-3 px-4 bg-error text-on-error rounded-xl font-label-md text-label-md hover:opacity-90 shadow-lg shadow-error/20 transition-all" onclick="confirmDelete()">
                Delete
            </button>
        </div>
    </div>
</div>

<!-- Modal: Add/Edit Event Form -->
<div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4 overflow-y-auto py-10" id="add-modal">
    <div class="fixed inset-0 bg-on-background/40 backdrop-blur-sm"></div>
    <div class="relative bg-surface-container-lowest w-full max-w-2xl p-8 rounded-2xl shadow-2xl border border-outline-variant my-auto">
        <div class="flex justify-between items-center mb-8">
            <h3 class="font-headline-md text-headline-md font-bold text-primary" id="modal-title">Add New Event</h3>
            <button class="p-2 hover:bg-surface-container rounded-full text-on-surface-variant" onclick="document.getElementById('add-modal').classList.add('hidden')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="/admin/events" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="id" id="event-id" value="">

            <!-- Event Title -->
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Event Title</label>
                <input name="title" id="event-title" class="w-full rounded-lg border-outline-variant bg-surface-bright text-on-surface font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all py-2.5 px-4" type="text" required>
            </div>

            <!-- Description -->
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Description</label>
                <textarea name="description" id="event-description" class="w-full rounded-lg border-outline-variant bg-surface-bright text-on-surface font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all py-2.5 px-4" rows="4" required></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Event Date -->
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Date &amp; Time</label>
                    <input name="event_date" id="event-date" class="w-full rounded-lg border-outline-variant bg-surface-bright text-on-surface font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all py-2.5 px-4" type="datetime-local" required>
                </div>

                <!-- Location -->
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Location</label>
                    <input name="location" id="event-location" class="w-full rounded-lg border-outline-variant bg-surface-bright text-on-surface font-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all py-2.5 px-4" type="text" required>
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Upload Banner Image (Optional)</label>
                <div class="border-2 border-dashed border-outline-variant rounded-xl p-6 flex flex-col items-center justify-center text-center hover:border-primary hover:bg-surface-container-low transition-colors cursor-pointer" onclick="document.getElementById('image-file-input').click()">
                    <span class="material-symbols-outlined text-4xl text-primary mb-2">cloud_upload</span>
                    <p class="font-label-md text-label-md text-on-surface" id="upload-status-text">Click to upload files</p>
                    <p class="font-body-md text-xs text-on-surface-variant mt-1">PNG, JPG or JPEG (max. 10MB)</p>
                    <input id="image-file-input" type="file" name="image" class="hidden" onchange="updateUploadStatus(this)">
                </div>

                <!-- Image Preview Container -->
                <div class="hidden items-center gap-4 mt-4 p-4 bg-surface-container-low border border-outline-variant rounded-xl" id="current-image-container">
                    <img class="w-20 h-20 object-cover rounded-lg border border-outline-variant" id="current-image-preview" src="">
                    <div>
                        <p class="font-label-md text-on-surface">Current Banner</p>
                        <p class="text-xs text-on-surface-variant">Uploading a new file will replace this image.</p>
                    </div>
                </div>
            </div>

            <!-- Featured Checkbox -->
            <div class="flex items-center gap-3">
                <input name="is_featured" id="event-is-featured" value="1" class="rounded border-outline-variant text-primary focus:ring-primary h-5 w-5" type="checkbox">
                <label class="font-body-md text-body-md text-on-surface cursor-pointer select-none" for="event-is-featured">Set as Featured Event</label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-4 pt-4 border-t border-outline-variant">
                <button type="button" class="flex-1 py-3 px-4 bg-surface-container-high text-on-surface font-label-md text-label-md rounded-lg hover:bg-surface-container transition-colors text-center" onclick="document.getElementById('add-modal').classList.add('hidden')">
                    Cancel
                </button>
                <button type="submit" class="flex-1 py-3 px-4 bg-primary text-on-primary font-label-md text-label-md rounded-lg hover:opacity-95 shadow-lg shadow-primary/20 transition-colors" id="submit-button">
                    Save Event
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let eventIdToDelete = null;

    function handleLogout(event) {
        event.preventDefault();
        const form = document.createElement('form');
        form.action = '{{ route("logout") }}';
        form.method = 'POST';
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        
        form.appendChild(csrfInput);
        document.body.appendChild(form);
        form.submit();
    }

    function filterEvents() {
        const query = document.getElementById('events-search').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.event-card');
        cards.forEach(card => {
            const title = card.getAttribute('data-title') || '';
            const location = card.getAttribute('data-location') || '';
            if (title.includes(query) || location.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function updateUploadStatus(input) {
        const textEl = document.getElementById('upload-status-text');
        if (input.files && input.files.length > 0) {
            textEl.textContent = 'Selected: ' + input.files[0].name;
            textEl.classList.add('text-primary');
            textEl.classList.add('font-bold');
        } else {
            textEl.textContent = 'Click to upload files';
            textEl.classList.remove('text-primary');
            textEl.classList.remove('font-bold');
        }
    }

    function openAddModal() {
        document.getElementById('modal-title').textContent = 'Add New Event';
        document.getElementById('submit-button').textContent = 'Create Event';
        document.getElementById('event-id').value = '';
        document.getElementById('event-title').value = '';
        document.getElementById('event-description').value = '';
        document.getElementById('event-date').value = '';
        document.getElementById('event-location').value = '';
        document.getElementById('event-is-featured').checked = false;
        
        document.getElementById('current-image-container').classList.add('hidden');
        document.getElementById('upload-status-text').textContent = 'Click to upload files';
        document.getElementById('upload-status-text').classList.remove('text-primary', 'font-bold');
        
        document.getElementById('add-modal').classList.remove('hidden');
    }

    function openEditModal(eventData) {
        document.getElementById('modal-title').textContent = 'Edit Event';
        document.getElementById('submit-button').textContent = 'Update Event';
        document.getElementById('event-id').value = eventData.id;
        document.getElementById('event-title').value = eventData.title;
        document.getElementById('event-description').value = eventData.description;
        document.getElementById('event-location').value = eventData.location;
        document.getElementById('event-is-featured').checked = !!eventData.is_featured;

        // Date format: YYYY-MM-DDTHH:mm
        if (eventData.event_date) {
            const dt = new Date(eventData.event_date);
            const pad = (n) => n.toString().padStart(2, '0');
            const localFormat = dt.getFullYear() + '-' + 
                                pad(dt.getMonth() + 1) + '-' + 
                                pad(dt.getDate()) + 'T' + 
                                pad(dt.getHours()) + ':' + 
                                pad(dt.getMinutes());
            document.getElementById('event-date').value = localFormat;
        } else {
            document.getElementById('event-date').value = '';
        }

        // Image Preview
        const imageContainer = document.getElementById('current-image-container');
        const imagePreview = document.getElementById('current-image-preview');
        if (eventData.image_path) {
            let path = eventData.image_path;
            if (!path.startsWith('http')) {
                if (!path.startsWith('/storage') && !path.startsWith('storage')) {
                    path = '/storage/' + path.replace(/^\//, '');
                } else {
                    path = '/' + path.replace(/^\//, '');
                }
            }
            imagePreview.src = path;
            imageContainer.classList.remove('hidden');
            imageContainer.classList.add('flex');
        } else {
            imageContainer.classList.add('hidden');
            imageContainer.classList.remove('flex');
        }

        document.getElementById('upload-status-text').textContent = 'Click to upload files';
        document.getElementById('upload-status-text').classList.remove('text-primary', 'font-bold');

        document.getElementById('add-modal').classList.remove('hidden');
    }

    function openDeleteDialog(id, title) {
        eventIdToDelete = id;
        document.getElementById('event-title-to-delete').textContent = title;
        document.getElementById('delete-dialog').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteDialog() {
        document.getElementById('delete-dialog').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function confirmDelete() {
        if (!eventIdToDelete) return;

        const form = document.createElement('form');
        form.action = "{{ url('/admin/events') }}/" + eventIdToDelete;
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

    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.getElementById('delete-dialog').classList.add('hidden');
            document.getElementById('add-modal').classList.add('hidden');
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        attachCropper(document.getElementById('image-file-input'), {
            aspectRatio: 16/9,
            previewImageElement: document.getElementById('current-image-preview'),
            onCropSuccess: (file) => {
                // Manually trigger the original onchange behaviour to update UI text
                updateUploadStatus(document.getElementById('image-file-input'));
            }
        });
    });
</script>
<script src="{{ asset('js/image-cropper.js') }}"></script>
</body>
</html>
