<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Teacher Management - MI Darun Najah Admin</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        body { font-family: 'Work Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .active-nav-item { transition: all 0.2s ease; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #bec9c8; border-radius: 10px; }
        .glass-overlay { backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.8); }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container flex min-h-screen overflow-hidden">
@include('admin.partials.sidebar', ['active' => 'teachers'])
<!-- Main Content Canvas -->
<main class="flex-1 ml-64 flex flex-col h-screen">
<!-- Top Toolbar -->
<header class="h-20 px-8 flex justify-between items-center bg-surface border-b border-outline-variant">
<div class="flex flex-col">
<h2 class="font-headline-md text-headline-md text-primary font-bold">Teacher Management</h2>
<nav class="flex text-xs text-on-surface-variant/60 gap-1">
<a class="hover:text-primary" href="#">Dashboard</a>
<span>/</span>
<span class="text-on-surface-variant">Teachers</span>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative group">
<input class="pl-10 pr-4 py-2 w-64 bg-surface-container-lowest border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-full font-body-md text-body-md transition-all" placeholder="Search teachers..." type="text"/>
<span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant group-focus-within:text-primary" data-icon="search">search</span>
</div>
<button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg flex items-center gap-2 font-label-md text-label-md shadow-sm hover:opacity-90 active:scale-95 transition-all" onclick="openAddModal()">
<span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                    Add New Teacher
                </button>
</div>
</header>
<!-- Content Area -->
<div class="flex-1 p-8 overflow-y-auto custom-scrollbar">
<!-- Stats Row -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined" data-icon="groups">groups</span>
</div>
<div>
<p class="text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">Total Teachers</p>
<p class="font-display-lg text-[32px] text-primary">{{ $teachers->count() }}</p>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-tertiary-container/10 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined" data-icon="verified">verified</span>
</div>
<div>
<p class="text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">Certified (NUPTK)</p>
<p class="font-display-lg text-[32px] text-tertiary">{{ $teachers->filter(fn($t) => !empty($t->nip))->count() }}</p>
</div>
</div>
<div class="bg-secondary-container p-6 rounded-xl border border-secondary-fixed flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-white/40 flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<div>
<p class="text-on-secondary-fixed-variant font-label-sm text-label-sm uppercase tracking-wider">Active Programs</p>
<p class="font-display-lg text-[32px] text-on-secondary-container">{{ \App\Models\Extracurricular::where('is_active', true)->count() }}</p>
</div>
</div>
</div>
<!-- Table Container -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden shadow-sm">
<!-- Table Filters -->
<div class="p-4 border-b border-outline-variant flex justify-between items-center bg-surface-container-low/50">
<div class="flex items-center gap-2">
<span class="text-on-surface-variant font-label-sm text-label-sm">Show:</span>
<select class="bg-transparent border-none text-on-surface font-label-md text-label-md focus:ring-0">
<option>10 entries</option>
<option>25 entries</option>
<option>50 entries</option>
</select>
</div>
<div class="flex gap-2">
<button class="flex items-center gap-2 px-3 py-1.5 border border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container-high font-label-sm text-label-sm transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                            Filter
                        </button>
<button class="flex items-center gap-2 px-3 py-1.5 border border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container-high font-label-sm text-label-sm transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                            Export
                        </button>
</div>
</div>
<!-- Actual Data Table -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container text-on-surface-variant uppercase text-[11px] font-bold tracking-widest border-b border-outline-variant">
<th class="px-6 py-4">Teacher</th>
<th class="px-6 py-4">Role / Jabatan</th>
<th class="px-6 py-4">Subject</th>
<th class="px-6 py-4">NUPTK</th>
<th class="px-6 py-4 text-center">Featured</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
@php
    $headmasters = $teachers->filter(fn($t) => in_array($t->role, ['Kepala Sekolah', 'Wakil Kepala Sekolah']));
    $regularTeachers = $teachers->filter(fn($t) => !in_array($t->role, ['Kepala Sekolah', 'Wakil Kepala Sekolah']));
@endphp

@if ($headmasters->isNotEmpty() || true)
<tr class="bg-primary/5">
    <td colspan="6" class="px-6 py-3 font-bold text-xs uppercase text-primary tracking-widest border-b border-outline-variant">
        Struktur Pimpinan (Kepala & Wakil Sekolah)
    </td>
</tr>
<!-- Permanent Headmaster Row -->
<tr class="hover:bg-surface-container-low/30 transition-colors bg-secondary-container/5">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg overflow-hidden border border-outline-variant bg-surface-container-high">
@if (!empty($settings['headmaster_photo']))
    <img class="w-full h-full object-cover" src="{{ filter_var($settings['headmaster_photo'], FILTER_VALIDATE_URL) ? $settings['headmaster_photo'] : (Str::startsWith($settings['headmaster_photo'], ['/storage', 'storage']) ? asset($settings['headmaster_photo']) : asset('storage/' . $settings['headmaster_photo'])) }}"/>
@else
    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold">
        K
    </div>
@endif
</div>
<div>
<p class="font-body-md text-body-md font-semibold text-primary">{{ $settings['headmaster_name'] ?? 'Dr. H. Ahmad Fauzi, M.Pd.' }}</p>
<p class="text-xs text-on-surface-variant">Kepala Sekolah (Utama)</p>
</div>
</div>
</td>
<td class="px-6 py-4">
    <span class="px-2.5 py-1 bg-primary text-on-primary text-xs font-bold rounded-full">Kepala Sekolah</span>
</td>
<td class="px-6 py-4 font-body-md text-body-md">Kepala Sekolah / Pimpinan</td>
<td class="px-6 py-4 font-mono text-sm text-on-surface-variant">-</td>
<td class="px-6 py-4 text-center">
<span class="px-2 py-1 bg-secondary/10 text-secondary text-xs rounded font-bold">Permanent</span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2">
<button onclick="openEditHeadmasterModal()" class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Edit">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
</div>
</td>
</tr>

@foreach ($headmasters as $teacher)
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg overflow-hidden border border-outline-variant bg-surface-container-high">
@if ($teacher->photo_path)
    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $teacher->photo_path) }}"/>
@else
    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold">
        {{ substr($teacher->name, 0, 1) }}
    </div>
@endif
</div>
<div>
<p class="font-body-md text-body-md font-semibold text-primary">{{ $teacher->name }}</p>
<p class="text-xs text-on-surface-variant">Active since {{ $teacher->created_at->format('Y') }}</p>
</div>
</div>
</td>
<td class="px-6 py-4">
    @if(($teacher->role ?? 'Guru') === 'Kepala Sekolah')
        <span class="px-2.5 py-1 bg-primary text-on-primary text-xs font-bold rounded-full">Kepala Sekolah</span>
    @elseif(($teacher->role ?? 'Guru') === 'Wakil Kepala Sekolah')
        <span class="px-2.5 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full">Waka Sekolah</span>
    @else
        <span class="px-2.5 py-1 bg-surface-variant text-on-surface-variant text-xs font-bold rounded-full">Guru</span>
    @endif
</td>
<td class="px-6 py-4 font-body-md text-body-md">{{ $teacher->subject }}</td>
<td class="px-6 py-4 font-mono text-sm text-on-surface-variant">{{ $teacher->nip ?? '-' }}</td>
<td class="px-6 py-4 text-center">
<label class="relative inline-flex items-center cursor-pointer">
<input {{ $teacher->is_active ? 'checked' : '' }} class="sr-only peer" type="checkbox" onchange="toggleTeacherActive({{ $teacher->id }}, this)"/>
<div class="relative w-11 h-6 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:bg-secondary after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:left-[22px]"></div>
</label>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2">
<button onclick="openEditModal({{ json_encode($teacher) }})" class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Edit">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button onclick="openDeleteDialog({{ $teacher->id }}, '{{ addslashes($teacher->name) }}')" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Delete">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
@endforeach
@endif

@if ($regularTeachers->isNotEmpty())
<tr class="bg-surface-container-low">
    <td colspan="6" class="px-6 py-3 font-bold text-xs uppercase text-on-surface-variant tracking-widest border-y border-outline-variant">
        Tenaga Pengajar (Guru)
    </td>
</tr>
@foreach ($regularTeachers as $teacher)
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg overflow-hidden border border-outline-variant bg-surface-container-high">
@if ($teacher->photo_path)
    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $teacher->photo_path) }}"/>
@else
    <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold">
        {{ substr($teacher->name, 0, 1) }}
    </div>
@endif
</div>
<div>
<p class="font-body-md text-body-md font-semibold text-primary">{{ $teacher->name }}</p>
<p class="text-xs text-on-surface-variant">Active since {{ $teacher->created_at->format('Y') }}</p>
</div>
</div>
</td>
<td class="px-6 py-4">
    @if(($teacher->role ?? 'Guru') === 'Kepala Sekolah')
        <span class="px-2.5 py-1 bg-primary text-on-primary text-xs font-bold rounded-full">Kepala Sekolah</span>
    @elseif(($teacher->role ?? 'Guru') === 'Wakil Kepala Sekolah')
        <span class="px-2.5 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full">Waka Sekolah</span>
    @else
        <span class="px-2.5 py-1 bg-surface-variant text-on-surface-variant text-xs font-bold rounded-full">Guru</span>
    @endif
</td>
<td class="px-6 py-4 font-body-md text-body-md">{{ $teacher->subject }}</td>
<td class="px-6 py-4 font-mono text-sm text-on-surface-variant">{{ $teacher->nip ?? '-' }}</td>
<td class="px-6 py-4 text-center">
<label class="relative inline-flex items-center cursor-pointer">
<input {{ $teacher->is_active ? 'checked' : '' }} class="sr-only peer" type="checkbox" onchange="toggleTeacherActive({{ $teacher->id }}, this)"/>
<div class="relative w-11 h-6 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:bg-secondary after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:left-[22px]"></div>
</label>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2">
<button onclick="openEditModal({{ json_encode($teacher) }})" class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Edit">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button onclick="openDeleteDialog({{ $teacher->id }}, '{{ addslashes($teacher->name) }}')" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Delete">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
@endforeach
@endif

@if ($headmasters->isEmpty() && $regularTeachers->isEmpty())
<tr>
<td colspan="6" class="px-6 py-8 text-center text-on-surface-variant">Belum ada data guru. Silakan tambahkan melalui tombol di atas.</td>
</tr>
@endif
</tbody>
</table>
</div>
</div>
</div>
</main>
<!-- Modal: Confirmation Dialog (Hidden by Default) -->
<div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4" id="delete-dialog">
<div class="fixed inset-0 bg-on-background/40 glass-overlay"></div>
<div class="relative bg-surface-container-lowest w-full max-w-md p-8 rounded-2xl shadow-2xl border border-outline-variant animate-in fade-in zoom-in duration-200">
<div class="w-16 h-16 bg-error-container rounded-full flex items-center justify-center text-error mx-auto mb-6">
<span class="material-symbols-outlined text-3xl" data-icon="warning">warning</span>
</div>
<h3 class="text-center font-headline-md text-headline-md font-bold mb-2">Delete Teacher?</h3>
<p class="text-center text-on-surface-variant font-body-md text-body-md mb-8">
                Are you sure you want to delete <span class="font-bold text-on-surface" id="teacher-name-to-delete">Teacher Name</span>? This action is permanent and cannot be undone.
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
<!-- Modal: Add/Edit Teacher Form -->
<div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4" id="add-modal">
<div class="fixed inset-0 bg-on-background/40 glass-overlay"></div>
<div class="relative bg-surface-container-lowest w-full max-w-2xl p-8 rounded-2xl shadow-2xl border border-outline-variant animate-in fade-in zoom-in duration-200">
<div class="flex justify-between items-center mb-8">
<h3 class="font-headline-md text-headline-md font-bold text-primary" id="modal-title">Add New Teacher</h3>
<button class="p-2 hover:bg-surface-container rounded-full text-on-surface-variant" onclick="document.getElementById('add-modal').classList.add('hidden')">
<span class="material-symbols-outlined" data-icon="close">close</span>
</button>
</div>
<form action="/admin/teachers" method="POST" enctype="multipart/form-data" class="space-y-4 max-h-[70vh] overflow-y-auto pr-2">
@csrf
<input type="hidden" name="id" id="teacher-id" value="">
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Full Name (with degree)</label>
<input name="name" id="teacher-name" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" placeholder="e.g. Ust. Ahmad Syarifuddin, M.Pd" type="text"/>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">NUPTK Number (NIP)</label>
<input name="nip" id="teacher-nip" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" placeholder="16-digit code" type="text"/>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Jabatan / Peran</label>
<select name="role" id="teacher-role" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md">
<option value="Guru">Guru Biasa</option>
<option value="Kepala Sekolah">Kepala Sekolah</option>
<option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
</select>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Primary Subject</label>
<select name="subject" id="teacher-subject" required class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md">
<option value="Fiqh & Aqidah">Fiqh &amp; Aqidah</option>
<option value="Mathematics">Mathematics</option>
<option value="Arabic Language">Arabic Language</option>
<option value="Physical Education">Physical Education</option>
</select>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Urutan / Prioritas Tampilan (1 = Teratas)</label>
<input name="order" id="teacher-order" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" placeholder="e.g. 1 untuk Kepala Sekolah, 2, 3 dst." type="number" value="2"/>
</div>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Quote Guru</label>
<textarea name="quote" id="teacher-quote" class="w-full bg-surface border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" rows="2" placeholder="e.g. Pendidikan sejati bukan hanya mentransfer ilmu..."></textarea>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Biografi Singkat</label>
<textarea name="bio" id="teacher-bio" class="w-full bg-surface border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" rows="3" placeholder="Jelaskan biografi singkat mengenai guru..."></textarea>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Pendidikan (satu baris per entri)</label>
<textarea name="education" id="teacher-education" class="w-full bg-surface border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" rows="2" placeholder="e.g. Master of Education (M.Pd.) - UPI (2010 - 2012)"></textarea>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant">Pengalaman Kerja (satu baris per entri)</label>
<textarea name="experience" id="teacher-experience" class="w-full bg-surface border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md" rows="2" placeholder="e.g. Senior Mathematics Instructor - MI Darun Najah (2015 - Present)"></textarea>
</div>
<div class="space-y-1">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Profile Photo</label>
<div id="current-photo-container" class="hidden mb-2 items-center gap-3">
    <img id="current-photo-preview" src="" class="w-16 h-16 object-cover rounded-lg border border-outline-variant">
    <div>
        <p class="text-xs text-on-surface-variant">Foto saat ini. Pilih berkas baru untuk mengubah.</p>
    </div>
</div>
<input type="file" id="teacher-photo-input" name="photo" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2 font-body-md" accept="image/*"/>
</div>
<div class="flex justify-end gap-4 pt-4 border-t border-outline-variant">
<button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="document.getElementById('add-modal').classList.add('hidden')" type="button">Cancel</button>
<button class="bg-primary text-on-primary px-8 py-2.5 rounded-lg font-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-all" type="submit" id="submit-button">Save Teacher Profile</button>
</div>
</form>
</div>
</div>

<script src="{{ asset('js/image-cropper.js') }}"></script>
<script>
        let teacherIdToDelete = null;

        function openDeleteDialog(id, name) {
            teacherIdToDelete = id;
            document.getElementById('teacher-name-to-delete').textContent = name;
            document.getElementById('delete-dialog').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDeleteDialog() {
            document.getElementById('delete-dialog').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function confirmDelete() {
            if (!teacherIdToDelete) return;
            
            const btn = document.querySelector('#delete-dialog button:last-child');
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin" data-icon="progress_activity">progress_activity</span> Deleting...';
            
            const form = document.createElement('form');
            form.action = "{{ url('/admin/teachers') }}/" + teacherIdToDelete;
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

        function showAllFormFields() {
            document.getElementById('teacher-nip').parentElement.classList.remove('hidden');
            document.getElementById('teacher-subject').parentElement.classList.remove('hidden');
            document.getElementById('teacher-role').parentElement.classList.remove('hidden');
            document.getElementById('teacher-order').parentElement.classList.remove('hidden');
            document.getElementById('teacher-bio').parentElement.classList.remove('hidden');
            document.getElementById('teacher-education').parentElement.classList.remove('hidden');
            document.getElementById('teacher-experience').parentElement.classList.remove('hidden');
        }

        function openEditHeadmasterModal() {
            document.getElementById('modal-title').textContent = 'Edit Kepala Sekolah Details';
            document.getElementById('teacher-id').value = 'headmaster';
            document.getElementById('teacher-name').value = `{!! addslashes($settings['headmaster_name'] ?? 'Dr. H. Ahmad Fauzi, M.Pd.') !!}`;
            document.getElementById('teacher-nip').parentElement.classList.add('hidden');
            document.getElementById('teacher-subject').parentElement.classList.add('hidden');
            document.getElementById('teacher-role').parentElement.classList.add('hidden');
            document.getElementById('teacher-order').parentElement.classList.add('hidden');
            
            document.getElementById('teacher-quote').value = `{!! addslashes($settings['headmaster_quote'] ?? 'Mendidik dengan hati, membimbing dengan Al-Qur\'an.') !!}`;
            document.getElementById('teacher-bio').parentElement.classList.add('hidden');
            document.getElementById('teacher-education').parentElement.classList.add('hidden');
            document.getElementById('teacher-experience').parentElement.classList.add('hidden');
            
            // Photo preview
            const photoContainer = document.getElementById('current-photo-container');
            const photoPreview = document.getElementById('current-photo-preview');
            const photoPath = `{!! $settings['headmaster_photo'] ?? '' !!}`;
            if (photoPath) {
                photoPreview.src = photoPath.startsWith('http') ? photoPath : (photoPath.startsWith('/storage') ? photoPath : '/storage/' + photoPath);
                photoContainer.classList.remove('hidden');
                photoContainer.classList.add('flex');
            } else {
                photoContainer.classList.add('hidden');
                photoContainer.classList.remove('flex');
            }
            
            document.getElementById('submit-button').textContent = 'Update Kepala Sekolah';
            document.getElementById('add-modal').classList.remove('hidden');
        }

        function openAddModal() {
            showAllFormFields();
            document.getElementById('modal-title').textContent = 'Add New Teacher';
            document.getElementById('teacher-id').value = '';
            document.getElementById('teacher-name').value = '';
            document.getElementById('teacher-nip').value = '';
            document.getElementById('teacher-role').value = 'Guru';
            document.getElementById('teacher-subject').value = 'Fiqh & Aqidah';
            document.getElementById('teacher-order').value = 2;
            document.getElementById('teacher-quote').value = '';
            document.getElementById('teacher-bio').value = '';
            document.getElementById('teacher-education').value = '';
            document.getElementById('teacher-experience').value = '';
            document.getElementById('current-photo-container').classList.add('hidden');
            document.getElementById('current-photo-container').classList.remove('flex');
            document.getElementById('submit-button').textContent = 'Save Teacher Profile';
            document.getElementById('add-modal').classList.remove('hidden');
        }

        function openEditModal(teacher) {
            showAllFormFields();
            document.getElementById('modal-title').textContent = 'Edit Teacher Profile';
            document.getElementById('teacher-id').value = teacher.id;
            document.getElementById('teacher-name').value = teacher.name;
            document.getElementById('teacher-nip').value = teacher.nip || '';
            
            // Handle subject dropdown selection/addition
            const subjectSelect = document.getElementById('teacher-subject');
            let optionExists = false;
            for (let i = 0; i < subjectSelect.options.length; i++) {
                if (subjectSelect.options[i].value === teacher.subject) {
                    optionExists = true;
                    break;
                }
            }
            if (!optionExists) {
                const newOpt = document.createElement('option');
                newOpt.value = teacher.subject;
                newOpt.textContent = teacher.subject;
                subjectSelect.appendChild(newOpt);
            }
            subjectSelect.value = teacher.subject;
            
            document.getElementById('teacher-order').value = teacher.order || 2;
            document.getElementById('teacher-role').value = teacher.role || 'Guru';
            document.getElementById('teacher-quote').value = teacher.quote || '';
            document.getElementById('teacher-bio').value = teacher.bio || '';
            document.getElementById('teacher-education').value = teacher.education || '';
            document.getElementById('teacher-experience').value = teacher.experience || '';
            
            // Photo preview
            const photoContainer = document.getElementById('current-photo-container');
            const photoPreview = document.getElementById('current-photo-preview');
            if (teacher.photo_path) {
                photoPreview.src = '/storage/' + teacher.photo_path;
                photoContainer.classList.remove('hidden');
                photoContainer.classList.add('flex');
            } else {
                photoContainer.classList.add('hidden');
                photoContainer.classList.remove('flex');
            }
            
            document.getElementById('submit-button').textContent = 'Update Teacher Profile';
            document.getElementById('add-modal').classList.remove('hidden');
        }

        // Close modals on ESC
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

        function toggleTeacherActive(id, checkbox) {
            checkbox.disabled = true;
            
            fetch(`/admin/teachers/${id}/toggle-active`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                checkbox.disabled = false;
                if (!data.success) {
                    checkbox.checked = !checkbox.checked;
                    alert('Gagal memperbarui status keaktifan guru.');
                }
            })
            .catch(error => {
                checkbox.disabled = false;
                checkbox.checked = !checkbox.checked;
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan.');
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            attachCropper(document.getElementById('teacher-photo-input'), {
                aspectRatio: () => {
                    const isHeadmaster = document.getElementById('teacher-id').value === 'headmaster';
                    return isHeadmaster ? 3/4 : 1;
                },
                previewImageElement: document.getElementById('current-photo-preview')
            });
        });
    </script>
</body></html>