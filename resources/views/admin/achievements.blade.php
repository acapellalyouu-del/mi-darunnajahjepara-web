<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Achievement Management - MI Darun Najah Admin</title>
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
@include('admin.partials.sidebar', ['active' => 'achievements'])

<!-- Main Content Area -->
<main class="ml-64 min-h-screen flex flex-col">
    <!-- Top Bar -->
    <header class="h-20 px-8 flex justify-between items-center bg-surface border-b border-outline-variant">
        <div class="flex flex-col">
            <h2 class="font-headline-md text-headline-md text-primary font-bold">Manage Achievements</h2>
            <nav class="flex text-xs text-on-surface-variant/60 gap-1">
                <a class="hover:text-primary" href="/admin">Dashboard</a>
                <span>/</span>
                <span class="text-on-surface-variant">Achievements</span>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative group">
                <input class="pl-10 pr-4 py-2 w-64 bg-surface-container-lowest border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-full font-body-md text-body-md transition-all" id="achievements-search" placeholder="Search achievements..." type="text"/>
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant group-focus-within:text-primary">search</span>
            </div>
            <button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg flex items-center gap-2 font-label-md text-label-md shadow-sm hover:opacity-90 active:scale-95 transition-all" onclick="openAddModal()">
                <span class="material-symbols-outlined">add</span>
                Add Achievement
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

        <!-- Stats Bar -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-primary-container/10 flex items-center justify-center rounded-full">
                    <span class="material-symbols-outlined text-primary">trophy</span>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total Awards</p>
                    <h4 class="font-headline-md text-headline-md font-bold text-primary">{{ $achievements->count() }}</h4>
                </div>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-secondary-container/10 flex items-center justify-center rounded-full">
                    <span class="material-symbols-outlined text-secondary">star</span>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Featured</p>
                    <h4 class="font-headline-md text-headline-md font-bold text-primary">{{ $achievements->where('is_featured', true)->count() }}</h4>
                </div>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-tertiary-container/10 flex items-center justify-center rounded-full">
                    <span class="material-symbols-outlined text-tertiary">school</span>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Academic</p>
                    <h4 class="font-headline-md text-headline-md font-bold text-primary">{{ $achievements->filter(fn($ach) => stripos($ach->category, 'academic') !== false || stripos($ach->category, 'akademik') !== false)->count() }}</h4>
                </div>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-primary-fixed-dim/20 flex items-center justify-center rounded-full">
                    <span class="material-symbols-outlined text-primary">sports_soccer</span>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Non-Academic</p>
                    <h4 class="font-headline-md text-headline-md font-bold text-primary">{{ $achievements->filter(fn($ach) => stripos($ach->category, 'academic') === false && stripos($ach->category, 'akademik') === false)->count() }}</h4>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-t-xl p-4 flex flex-wrap items-center justify-between gap-4">
            <div class="flex gap-4">
                <div class="relative min-w-[160px]">
                    <select id="category-filter" onchange="filterTable()" class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-2 text-label-md appearance-none focus:ring-primary focus:border-primary">
                        <option value="all">All Categories</option>
                        <option value="Academic">Academic</option>
                        <option value="Non-Academic">Non-Academic</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-2 pointer-events-none text-on-surface-variant">expand_more</span>
                </div>
            </div>
            <div class="text-label-md text-on-surface-variant">
                <span>Showing <span id="visible-count">{{ $achievements->count() }}</span> achievements</span>
            </div>
        </div>

        <!-- Achievements Data Table -->
        <div class="bg-surface-container-lowest border-x border-b border-outline-variant overflow-hidden rounded-b-xl">
            <table class="w-full text-left" id="achievements-table">
                <thead class="bg-surface-container-low border-b border-outline-variant">
                    <tr>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase">Achievement</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase">Category</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase text-center">Date</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase text-center">Featured</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase">Status</th>
                        <th class="px-6 py-4 font-label-md text-label-md text-on-surface uppercase text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    @forelse ($achievements as $achievement)
                        <tr class="hover:bg-surface-container/50 transition-colors achievement-row" 
                            data-title="{{ strtolower($achievement->title) }}" 
                            data-achiever="{{ strtolower($achievement->achiever_name) }}"
                            data-category="{{ $achievement->category }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden flex-shrink-0 bg-surface-variant">
                                        <img class="w-full h-full object-cover" src="{{ filter_var($achievement->image_path, FILTER_VALIDATE_URL) ? $achievement->image_path : asset('storage/' . $achievement->image_path) }}" alt="{{ $achievement->title }}">
                                    </div>
                                    <div>
                                        <p class="font-label-md text-label-md text-on-surface">{{ $achievement->title }}</p>
                                        <p class="font-label-sm text-label-sm text-on-surface-variant">Peraih: {{ $achievement->achiever_name }} ({{ $achievement->rank }})</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-label-md text-label-md text-primary">{{ $achievement->category }}</span>
                            </td>
                            <td class="px-6 py-4 text-center font-label-md text-label-md">
                                {{ \Carbon\Carbon::parse($achievement->date)->translatedFormat('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if ($achievement->is_featured)
                                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                                @else
                                    <span class="material-symbols-outlined text-outline-variant">star</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-2 text-label-sm font-bold {{ $achievement->status === 'Published' ? 'text-tertiary' : 'text-on-surface-variant/60' }}">
                                    <span class="w-2 h-2 rounded-full {{ $achievement->status === 'Published' ? 'bg-tertiary' : 'bg-on-surface-variant/40' }}"></span>
                                    {{ $achievement->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 text-primary hover:bg-primary-container/10 rounded-lg transition-colors" onclick="openEditModal({{ json_encode($achievement) }})">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button class="p-2 text-error hover:bg-error-container/10 rounded-lg transition-colors" onclick="openDeleteDialog({{ $achievement->id }}, '{{ $achievement->title }}')">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-on-surface-variant">Belum ada prestasi yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Delete Dialog -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden" id="delete-dialog">
    <div class="bg-surface rounded-2xl p-6 max-w-md w-full border border-outline-variant shadow-xl">
        <h3 class="font-headline-md text-headline-md text-primary mb-2">Hapus Prestasi</h3>
        <p class="font-body-md text-on-surface-variant mb-6">Apakah Anda yakin ingin menghapus prestasi <span class="font-bold text-on-surface" id="achievement-title-to-delete"></span>? Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex justify-end gap-4">
            <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="closeDeleteDialog()">Batal</button>
            <button class="bg-error text-on-error px-6 py-2.5 rounded-lg font-label-md shadow-lg shadow-error/20 hover:opacity-90 transition-all" onclick="confirmDelete()">Hapus Prestasi</button>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden overflow-y-auto" id="add-modal">
    <div class="bg-surface rounded-2xl border border-outline-variant max-w-2xl w-full shadow-2xl overflow-hidden my-8">
        <div class="p-6 border-b border-outline-variant bg-surface-container-low flex justify-between items-center">
            <h3 class="font-headline-md text-headline-md text-primary font-bold" id="modal-title">Add Achievement</h3>
            <button class="text-on-surface-variant hover:text-on-surface" onclick="document.getElementById('add-modal').classList.add('hidden')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="/admin/achievements" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <input type="hidden" name="id" id="achievement-id">

            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Judul Prestasi / Kejuaraan</label>
                <input class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-title" name="title" required type="text" placeholder="e.g. Juara 1 Olimpiade Sains Nasional">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kategori</label>
                    <select class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-category" name="category">
                        <option value="Academic">Academic</option>
                        <option value="Non-Academic">Non-Academic</option>
                        <option value="Religious">Religious</option>
                        <option value="Sports">Sports</option>
                        <option value="Art & Culture">Art & Culture</option>
                    </select>
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Tingkat / Peringkat</label>
                    <input class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-rank" name="rank" required type="text" placeholder="e.g. Juara 1 Tingkat Nasional">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nama Peraih (Siswa/Grup)</label>
                    <input class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-achiever" name="achiever_name" required type="text" placeholder="e.g. Muhammad Raihan">
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Tanggal Diperoleh</label>
                    <input class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-date" name="date" required type="date">
                </div>
            </div>

            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Deskripsi Singkat</label>
                <textarea class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-description" name="description" rows="3" placeholder="Jelaskan mengenai prestasi ini..."></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Status</label>
                    <select class="w-full px-4 py-2.5 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none" id="achievement-status" name="status">
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input type="checkbox" name="is_featured" id="achievement-featured" value="1" class="rounded border-outline-variant text-primary focus:ring-primary">
                    <label for="achievement-featured" class="font-label-sm text-label-sm text-on-surface-variant">Tampilkan di Homepage (Featured)</label>
                </div>
            </div>

            <div>
                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Foto Prestasi / Sertifikat</label>
                <div class="hidden gap-3 items-center mb-2 bg-surface-container p-3 rounded-lg border border-outline-variant" id="current-photo-container">
                    <img class="w-16 h-12 object-cover rounded" id="current-photo-preview" src="" alt="Preview">
                    <p class="text-xs text-on-surface-variant">Foto prestasi saat ini</p>
                </div>
                <input type="file" id="achievement-photo-input" name="image" class="w-full bg-surface border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-3 font-body-md" accept="image/*"/>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-outline-variant">
                <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="document.getElementById('add-modal').classList.add('hidden')" type="button">Cancel</button>
                <button class="bg-primary text-on-primary px-8 py-2.5 rounded-lg font-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-all" type="submit" id="submit-button">Save Achievement</button>
            </div>
        </form>
    </div>
</div>

<script>
    let achievementIdToDelete = null;

    function openDeleteDialog(id, title) {
        achievementIdToDelete = id;
        document.getElementById('achievement-title-to-delete').textContent = title;
        document.getElementById('delete-dialog').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteDialog() {
        document.getElementById('delete-dialog').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function confirmDelete() {
        if (!achievementIdToDelete) return;
        
        const form = document.createElement('form');
        form.action = "{{ url('/admin/achievements') }}/" + achievementIdToDelete;
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
        document.getElementById('modal-title').textContent = 'Add Achievement';
        document.getElementById('achievement-id').value = '';
        document.getElementById('achievement-title').value = '';
        document.getElementById('achievement-category').value = 'Academic';
        document.getElementById('achievement-rank').value = '';
        document.getElementById('achievement-achiever').value = '';
        document.getElementById('achievement-date').value = '';
        document.getElementById('achievement-description').value = '';
        document.getElementById('achievement-status').value = 'Published';
        document.getElementById('achievement-featured').checked = false;
        document.getElementById('current-photo-container').classList.add('hidden');
        document.getElementById('submit-button').textContent = 'Save Achievement';
        document.getElementById('add-modal').classList.remove('hidden');
    }

    function openEditModal(achievement) {
        document.getElementById('modal-title').textContent = 'Edit Achievement';
        document.getElementById('achievement-id').value = achievement.id;
        document.getElementById('achievement-title').value = achievement.title;
        document.getElementById('achievement-category').value = achievement.category;
        document.getElementById('achievement-rank').value = achievement.rank;
        document.getElementById('achievement-achiever').value = achievement.achiever_name;
        document.getElementById('achievement-date').value = achievement.date;
        document.getElementById('achievement-description').value = achievement.description || '';
        document.getElementById('achievement-status').value = achievement.status;
        document.getElementById('achievement-featured').checked = achievement.is_featured == 1;

        // Photo preview
        const photoContainer = document.getElementById('current-photo-container');
        const photoPreview = document.getElementById('current-photo-preview');
        if (achievement.image_path) {
            photoPreview.src = achievement.image_path.startsWith('http') ? achievement.image_path : '/storage/' + achievement.image_path;
            photoContainer.classList.remove('hidden');
            photoContainer.classList.add('flex');
        } else {
            photoContainer.classList.add('hidden');
            photoContainer.classList.remove('flex');
        }

        document.getElementById('submit-button').textContent = 'Update Achievement';
        document.getElementById('add-modal').classList.remove('hidden');
    }

    // Live search and filter logic
    const searchInput = document.getElementById('achievements-search');
    searchInput.addEventListener('input', filterTable);

    function filterTable() {
        const query = searchInput.value.toLowerCase().trim();
        const categoryFilter = document.getElementById('category-filter').value;
        const rows = document.querySelectorAll('.achievement-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const title = row.getAttribute('data-title');
            const achiever = row.getAttribute('data-achiever');
            const category = row.getAttribute('data-category');

            // Search query match
            const queryMatch = title.includes(query) || achiever.includes(query);

            // Category match
            let categoryMatch = true;
            if (categoryFilter !== 'all') {
                if (categoryFilter === 'Academic') {
                    categoryMatch = category.toLowerCase().includes('academic') || category.toLowerCase().includes('akademik');
                } else if (categoryFilter === 'Non-Academic') {
                    categoryMatch = !category.toLowerCase().includes('academic') && !category.toLowerCase().includes('akademik');
                }
            }

            if (queryMatch && categoryMatch) {
                row.style.display = 'table-row';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('visible-count').textContent = visibleCount;
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

    document.addEventListener('DOMContentLoaded', () => {
        attachCropper(document.getElementById('achievement-photo-input'), {
            aspectRatio: NaN, // free cropping for achievement/certificate images
            previewImageElement: document.getElementById('current-photo-preview')
        });
    });
</script>
<script src="{{ asset('js/image-cropper.js') }}"></script>
</body>
</html>
