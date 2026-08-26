<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Extracurricular Management - MI Darun Najah Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Work Sans', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .custom-toggle:checked + .toggle-dot {
            transform: translateX(100%);
            background-color: #ffffff;
        }
        .custom-toggle:checked {
            background-color: #006666;
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
                        "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "700"}],
                        "label-sm": ["12px", {"lineHeight": "1.2", "fontWeight": "500"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                        "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">
@include('admin.partials.sidebar', ['active' => 'extracurriculars'])

<!-- Main Content -->
<main class="flex-1 ml-0 md:ml-64 p-margin-mobile md:p-margin-desktop w-full max-w-container-max mx-auto overflow-x-hidden">
    <!-- Header Section -->
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="font-headline-lg text-headline-lg text-primary mb-2">Extracurricular Management</h1>
            <p class="text-on-surface-variant font-body-md text-body-md">Manage school clubs, sports activities, and talent programs.</p>
        </div>
        <button onclick="openAddModal()" class="bg-primary text-on-primary px-6 py-3 rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all shadow-sm active:scale-95 flex items-center gap-2">
            <span class="material-symbols-outlined">add</span>
            Add New Activity
        </button>
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

    <!-- Filter & Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter mb-8">
        <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-[32px]">sports_soccer</span>
            </div>
            <div>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Total Activities</p>
                <p class="text-headline-md font-headline-md text-primary">{{ $extracurriculars->count() }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-secondary-container/20 flex items-center justify-center text-secondary">
                <span class="material-symbols-outlined text-[32px]">grade</span>
            </div>
            <div>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Featured</p>
                <p class="text-headline-md font-headline-md text-secondary">{{ $extracurriculars->where('is_featured', true)->count() }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-tertiary-container/10 flex items-center justify-center text-tertiary">
                <span class="material-symbols-outlined text-[32px]">person</span>
            </div>
            <div>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Active Coaches</p>
                <p class="text-headline-md font-headline-md text-tertiary">{{ $extracurriculars->where('is_active', true)->pluck('coach_name')->filter()->unique()->count() }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-error-container/20 flex items-center justify-center text-error">
                <span class="material-symbols-outlined text-[32px]">pending_actions</span>
            </div>
            <div>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Active Programs</p>
                <p class="text-headline-md font-headline-md text-error">{{ $extracurriculars->where('is_active', true)->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Bento Grid Layout for Activities -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        @forelse ($extracurriculars as $extra)
        <div class="group bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="h-48 relative overflow-hidden bg-surface-container">
                @if($extra->image_path)
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ filter_var($extra->image_path, FILTER_VALIDATE_URL) ? $extra->image_path : (Str::startsWith($extra->image_path, ['/storage', 'storage']) ? asset($extra->image_path) : asset('storage/' . $extra->image_path)) }}">
                @else
                    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-4xl">sports_basketball</span>
                    </div>
                @endif
                <div class="absolute top-4 left-4 flex gap-2">
                    <span class="px-3 py-1 bg-primary text-on-primary text-label-sm rounded-full shadow-sm">
                        {{ $extra->category ?? 'General' }}
                    </span>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <h3 class="absolute bottom-4 left-4 font-headline-md text-white font-bold">{{ $extra->name }}</h3>
            </div>
            <div class="p-6">
                <!-- Coach Info -->
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full border-2 border-primary-fixed overflow-hidden bg-surface-container-high">
                        @if($extra->coach_photo_path)
                            <img class="w-full h-full object-cover" src="{{ filter_var($extra->coach_photo_path, FILTER_VALIDATE_URL) ? $extra->coach_photo_path : (Str::startsWith($extra->coach_photo_path, ['/storage', 'storage']) ? asset($extra->coach_photo_path) : asset('storage/' . $extra->coach_photo_path)) }}">
                        @else
                            <div class="w-full h-full bg-secondary-container/30 flex items-center justify-center text-secondary font-bold">
                                {{ substr($extra->coach_name ?? 'C', 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="font-label-md text-label-md font-semibold">{{ $extra->coach_name ?? 'No Coach assigned' }}</p>
                        <p class="text-label-sm text-on-surface-variant">{{ $extra->coach_role ?? 'Instructor' }}</p>
                    </div>
                </div>

                <!-- Schedule & Location -->
                <div class="space-y-2 mb-6 text-sm">
                    <div class="flex items-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-base">schedule</span>
                        {{ $extra->schedule ?? 'Not Scheduled' }}
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-base">location_on</span>
                        {{ $extra->location ?? 'School Campus' }}
                    </div>
                </div>

                <!-- Toggle Actions & Edit/Delete -->
                <div class="flex items-center justify-between pt-4 border-t border-outline-variant">
                    <div class="flex flex-col gap-2">
                        <span class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full {{ $extra->is_active ? 'bg-primary' : 'bg-outline' }}"></span>
                            <span class="text-xs text-on-surface-variant">{{ $extra->is_active ? 'Active' : 'Inactive' }}</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full {{ $extra->is_featured ? 'bg-secondary' : 'bg-outline-variant' }}"></span>
                            <span class="text-xs text-on-surface-variant">{{ $extra->is_featured ? 'Featured' : 'Not Featured' }}</span>
                        </span>
                    </div>
                    <div class="flex gap-1">
                        <button onclick="openEditModal({{ json_encode($extra) }})" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
                            <span class="material-symbols-outlined">edit</span>
                        </button>
                        <button onclick="openDeleteDialog({{ $extra->id }}, '{{ addslashes($extra->name) }}')" class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors" title="Delete">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-12 text-center text-on-surface-variant">
            No extracurricular activities registered yet. Click "Add New Activity" to create one.
        </div>
        @endforelse
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4" id="delete-dialog">
        <div class="fixed inset-0 bg-on-background/40 backdrop-blur-sm"></div>
        <div class="relative bg-surface-container-lowest w-full max-w-md p-8 rounded-2xl shadow-2xl border border-outline-variant animate-in fade-in zoom-in duration-200">
            <div class="w-16 h-16 bg-error-container rounded-full flex items-center justify-center text-error mx-auto mb-6">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h3 class="text-center font-headline-md text-headline-md font-bold mb-2">Delete Activity?</h3>
            <p class="text-center text-on-surface-variant font-body-md text-body-md mb-8">
                Are you sure you want to delete <span class="font-bold text-on-surface" id="activity-name-to-delete">Activity Name</span>? This action is permanent and cannot be undone.
            </p>
            <div class="flex gap-4">
                <button class="flex-1 py-3 px-4 border border-outline-variant text-on-surface-variant rounded-xl font-label-md text-label-md hover:bg-surface-container transition-colors" onclick="closeDeleteDialog()">
                    No, Cancel
                </button>
                <button class="flex-1 py-3 px-4 bg-error text-on-error rounded-xl font-label-md text-label-md hover:opacity-90 shadow-lg shadow-error/20 active:scale-95 transition-all" onclick="confirmDelete()">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Modal: Add/Edit Form -->
    <div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4 overflow-y-auto py-10" id="add-modal">
        <div class="fixed inset-0 bg-on-background/40 backdrop-blur-sm"></div>
        <div class="relative bg-surface-container-lowest w-full max-w-2xl p-8 rounded-2xl shadow-2xl border border-outline-variant my-auto">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-headline-md text-headline-md font-bold text-primary" id="modal-title">Add New Activity</h3>
                <button class="p-2 hover:bg-surface-container rounded-full text-on-surface-variant" onclick="document.getElementById('add-modal').classList.add('hidden')">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form action="/admin/extracurriculars" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="id" id="activity-id" value="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Activity Name</label>
                        <input name="name" id="activity-name" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" placeholder="e.g. Robotics Club" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Category</label>
                        <select name="category" id="activity-category" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md">
                            <option value="Sports">Sports</option>
                            <option value="Technology">Technology</option>
                            <option value="Religious">Religious</option>
                            <option value="Art & Culture">Art &amp; Culture</option>
                        </select>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Description</label>
                        <textarea name="description" id="activity-description" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" placeholder="Describe the activity, target audience, and goals..." rows="3"></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Coach Name</label>
                        <input name="coach_name" id="activity-coach-name" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" placeholder="e.g. Coach Ahmad Fauzi" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Coach Role / Designation</label>
                        <input name="coach_role" id="activity-coach-role" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" placeholder="e.g. Lead Instructor" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Schedule</label>
                        <input name="schedule" id="activity-schedule" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" placeholder="e.g. Mon & Wed, 15:30 - 17:00" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Location / Venue</label>
                        <input name="location" id="activity-location" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" placeholder="e.g. Main Hall (Auditorium)" type="text"/>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-outline-variant">
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant block">Background Banner Image</label>
                        <div id="current-image-container" class="hidden mb-2 items-center gap-3">
                            <img id="current-image-preview" src="" class="w-24 h-16 object-cover rounded-lg border border-outline-variant" onerror="this.parentElement.classList.add('hidden')">
                            <span class="text-xs text-on-surface-variant">Current Image</span>
                        </div>
                        <input type="file" id="extra-banner-input" name="image" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md text-sm" accept="image/*"/>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant block">Coach Profile Photo</label>
                        <div id="current-coach-photo-container" class="hidden mb-2 items-center gap-3">
                            <img id="current-coach-photo-preview" src="" class="w-16 h-16 object-cover rounded-full border border-outline-variant" onerror="this.parentElement.classList.add('hidden')">
                            <span class="text-xs text-on-surface-variant">Current Photo</span>
                        </div>
                        <input type="file" id="extra-coach-input" name="coach_photo" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md text-sm" accept="image/*"/>
                    </div>
                </div>

                <div class="flex items-center gap-6 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input name="is_active" id="activity-is-active" value="1" type="checkbox" class="rounded border-outline-variant text-primary focus:ring-primary h-5 w-5">
                        <span class="font-body-md text-on-surface">Active (Visible on Portal)</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input name="is_featured" id="activity-is-featured" value="1" type="checkbox" class="rounded border-outline-variant text-secondary focus:ring-secondary h-5 w-5">
                        <span class="font-body-md text-on-surface">Featured Activity</span>
                    </label>
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-outline-variant">
                    <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="document.getElementById('add-modal').classList.add('hidden')" type="button">Cancel</button>
                    <button class="bg-primary text-on-primary px-8 py-2.5 rounded-lg font-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-all" type="submit" id="submit-button">Save Activity</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    let activityIdToDelete = null;

    function openDeleteDialog(id, name) {
        activityIdToDelete = id;
        document.getElementById('activity-name-to-delete').textContent = name;
        document.getElementById('delete-dialog').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteDialog() {
        document.getElementById('delete-dialog').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function confirmDelete() {
        if (!activityIdToDelete) return;
        
        const btn = document.querySelector('#delete-dialog button:last-child');
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin">progress_activity</span> Deleting...';
        
        const form = document.createElement('form');
        form.action = "{{ url('/admin/extracurriculars') }}/" + activityIdToDelete;
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

    function openAddModal() {
        document.getElementById('modal-title').textContent = 'Add New Activity';
        document.getElementById('activity-id').value = '';
        document.getElementById('activity-name').value = '';
        document.getElementById('activity-description').value = '';
        document.getElementById('activity-category').value = 'Sports';
        document.getElementById('activity-coach-name').value = '';
        document.getElementById('activity-coach-role').value = '';
        document.getElementById('activity-schedule').value = '';
        document.getElementById('activity-location').value = '';
        document.getElementById('activity-is-active').checked = true;
        document.getElementById('activity-is-featured').checked = false;
        
        document.getElementById('current-image-container').classList.add('hidden');
        document.getElementById('current-coach-photo-container').classList.add('hidden');
        
        document.getElementById('submit-button').textContent = 'Save Activity';
        document.getElementById('add-modal').classList.remove('hidden');
    }

    function openEditModal(extra) {
        document.getElementById('modal-title').textContent = 'Edit Activity Details';
        document.getElementById('activity-id').value = extra.id;
        document.getElementById('activity-name').value = extra.name;
        document.getElementById('activity-description').value = extra.description;
        
        // Category dropdown
        const categorySelect = document.getElementById('activity-category');
        let optionExists = false;
        for (let i = 0; i < categorySelect.options.length; i++) {
            if (categorySelect.options[i].value === extra.category) {
                optionExists = true;
                break;
            }
        }
        if (!optionExists && extra.category) {
            const newOpt = document.createElement('option');
            newOpt.value = extra.category;
            newOpt.textContent = extra.category;
            categorySelect.appendChild(newOpt);
        }
        categorySelect.value = extra.category || 'Sports';
        
        document.getElementById('activity-coach-name').value = extra.coach_name || '';
        document.getElementById('activity-coach-role').value = extra.coach_role || '';
        document.getElementById('activity-schedule').value = extra.schedule || '';
        document.getElementById('activity-location').value = extra.location || '';
        document.getElementById('activity-is-active').checked = !!extra.is_active;
        document.getElementById('activity-is-featured').checked = !!extra.is_featured;
        
        // Banner Image preview
        const imageContainer = document.getElementById('current-image-container');
        const imagePreview = document.getElementById('current-image-preview');
        if (extra.image_path) {
            let path = extra.image_path;
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

        // Coach Photo preview
        const coachPhotoContainer = document.getElementById('current-coach-photo-container');
        const coachPhotoPreview = document.getElementById('current-coach-photo-preview');
        if (extra.coach_photo_path) {
            let path = extra.coach_photo_path;
            if (!path.startsWith('http')) {
                if (!path.startsWith('/storage') && !path.startsWith('storage')) {
                    path = '/storage/' + path.replace(/^\//, '');
                } else {
                    path = '/' + path.replace(/^\//, '');
                }
            }
            coachPhotoPreview.src = path;
            coachPhotoContainer.classList.remove('hidden');
            coachPhotoContainer.classList.add('flex');
        } else {
            coachPhotoContainer.classList.add('hidden');
            coachPhotoContainer.classList.remove('flex');
        }

        document.getElementById('submit-button').textContent = 'Update Activity';
        document.getElementById('add-modal').classList.remove('hidden');
    }

    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.getElementById('delete-dialog').classList.add('hidden');
            document.getElementById('add-modal').classList.add('hidden');
        }
    });

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
        // Bind Extracurricular Banner (16/9 Ratio)
        attachCropper(document.getElementById('extra-banner-input'), {
            aspectRatio: 16/9,
            previewImageElement: document.getElementById('current-image-preview')
        });

        // Bind Coach Profile (Square Ratio)
        attachCropper(document.getElementById('extra-coach-input'), {
            aspectRatio: 1,
            previewImageElement: document.getElementById('current-coach-photo-preview')
        });
    });
</script>
<script src="{{ asset('js/image-cropper.js') }}"></script>
</body>
</html>
