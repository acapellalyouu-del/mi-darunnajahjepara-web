<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin - Create/Edit Announcement | MI Darun Najah</title>
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
        body { font-family: 'Work Sans', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .active-nav {
            background-color: #006666;
            color: #93e1e0;
        }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #bec9c8; border-radius: 10px; }
        .editor-btn { padding: 4px 8px; border-radius: 4px; transition: background 0.2s; }
        .editor-btn:hover { background: #e1e3e4; }
        .glass-overlay { backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.8); }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container min-h-screen overflow-x-hidden">
<div class="block lg:flex min-h-screen">
@include('admin.partials.sidebar', ['active' => 'announcements'])
<main class="ml-0 lg:ml-64 flex-1 flex flex-col min-h-screen pt-14 lg:pt-0 bg-surface">
<form id="announcement-form" action="/admin/announcements" method="POST" enctype="multipart/form-data" class="flex flex-col min-h-screen">
@csrf
<input type="hidden" name="id" id="announcement-id" value="">
<!-- Header Bar -->
<header class="min-h-16 py-3 border-b border-outline-variant flex flex-col sm:flex-row items-start sm:items-center justify-between px-4 md:px-8 bg-white gap-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-2xl" data-icon="campaign">campaign</span>
<h2 class="font-headline-md text-base sm:text-lg md:text-headline-md font-bold text-primary">New Announcement</h2>
</div>
<div class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto">
<a href="/admin" class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant font-label-md text-xs sm:text-sm hover:bg-surface transition-all active:scale-95 flex items-center justify-center flex-1 sm:flex-initial">
                        Cancel
                    </a>
<button type="submit" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs sm:text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all active:scale-95 flex-1 sm:flex-initial" id="save-btn">
                        Publish Announcement
                    </button>
</div>
</header>

<!-- Content Area -->
<div class="flex-1 p-4 md:p-8">
<div class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-12 gap-6">
<!-- Left Column: Primary Fields -->
<div class="md:col-span-8 space-y-6">
<!-- Title Section -->
<div class="bg-white p-4 sm:p-6 rounded-xl border border-outline-variant shadow-sm space-y-4">
<div>
<label class="font-label-md text-sm text-on-surface-variant block mb-1.5 font-semibold">Announcement Title</label>
<input name="title" required class="w-full px-4 py-2.5 sm:py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all font-body-md text-sm sm:text-body-lg text-on-surface" id="announcement-title" placeholder="e.g. Annual School Festival 2024" type="text"/>
<p class="hidden text-error text-xs mt-1" id="error-title">Please provide a descriptive title for the announcement.</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="font-label-md text-xs sm:text-sm text-on-surface-variant block mb-1.5 font-semibold">Slug / URL (Optional)</label>
<input name="slug" class="w-full px-3.5 py-2 sm:py-2.5 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all font-body-md text-xs sm:text-sm text-on-surface" placeholder="e.g. annual-festival" type="text"/>
</div>
<div>
<label class="font-label-md text-xs sm:text-sm text-on-surface-variant block mb-1.5 font-semibold">Publish Date</label>
<input name="published_at" class="w-full px-3.5 py-2 sm:py-2.5 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all font-body-md text-xs sm:text-sm text-on-surface" type="date" value="{{ date('Y-m-d') }}"/>
</div>
</div>
</div>
<!-- Rich Text Editor -->
<div class="bg-white p-4 sm:p-6 rounded-xl border border-outline-variant shadow-sm space-y-4">
<label class="font-label-md text-sm text-on-surface-variant block font-semibold">Content</label>
<div class="border border-outline-variant rounded-lg overflow-hidden">
<div class="bg-surface-container-low p-2 border-b border-outline-variant flex flex-wrap gap-1">
<button type="button" onclick="formatText('bold')" class="editor-btn material-symbols-outlined hover:bg-surface-container-high p-1 rounded transition-colors text-sm" title="Bold">format_bold</button>
<button type="button" onclick="formatText('italic')" class="editor-btn material-symbols-outlined hover:bg-surface-container-high p-1 rounded transition-colors text-sm" title="Italic">format_italic</button>
<button type="button" onclick="formatText('underline')" class="editor-btn material-symbols-outlined hover:bg-surface-container-high p-1 rounded transition-colors text-sm" title="Underline">format_underlined</button>
</div>
<!-- Content Area -->
<textarea name="content" required class="w-full min-h-[250px] sm:min-h-[300px] p-4 sm:p-6 focus:outline-none border-none font-body-md text-sm sm:text-base text-on-surface leading-relaxed focus:ring-0" placeholder="Start writing the announcement details here..."></textarea>
</div>
</div>
</div>

<!-- Right Column: Media & Settings -->
<div class="md:col-span-4 space-y-6">
<!-- Featured Image & Category -->
<div class="bg-white p-4 sm:p-6 rounded-xl border border-outline-variant shadow-sm space-y-4">
    <h3 class="font-label-md text-sm text-on-surface border-b border-outline-variant pb-2 font-bold text-primary">Metadata Warta</h3>
    
    <div>
        <label class="font-label-sm text-xs text-on-surface-variant block mb-1">Kategori</label>
        <select name="category" required class="w-full bg-surface border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2.5 font-body-md text-xs sm:text-sm">
            <option value="Pengumuman">Pengumuman</option>
            <option value="Warta">Warta</option>
            <option value="Prestasi">Prestasi</option>
            <option value="Fasilitas">Fasilitas</option>
            <option value="Kegiatan">Kegiatan</option>
        </select>
    </div>

    <div>
        <label class="font-label-sm text-xs text-on-surface-variant block mb-1.5">Foto Utama / Banner Warta</label>
        <!-- Preview image container -->
        <div class="hidden gap-3 items-center mb-2 bg-surface-container p-2.5 rounded-lg border border-outline-variant" id="current-image-container">
            <img class="w-16 h-10 object-cover rounded" id="current-image-preview" src="" alt="Preview">
            <p class="text-xs text-on-surface-variant">Foto Utama</p>
        </div>
        <input type="file" id="announcement-image-input" name="image" class="w-full bg-surface border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg p-2 font-body-md text-xs" accept="image/*"/>
        <p class="text-[10px] text-outline mt-1 leading-tight">Rasio rekomendasi: 16:9. Maks 10MB.</p>
    </div>
</div>

<!-- Visibility Settings -->
<div class="bg-white p-4 sm:p-6 rounded-xl border border-outline-variant shadow-sm space-y-4">
<h3 class="font-label-md text-sm text-on-surface border-b border-outline-variant pb-2 font-bold text-primary">Publishing Settings</h3>
<!-- Toggle Active -->
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-xl" data-icon="keep">keep</span>
<div>
<p class="font-label-md text-xs sm:text-sm text-on-surface font-semibold">Publish Immediately</p>
<p class="text-[11px] text-on-surface-variant">Visible on public website</p>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox" name="is_active" value="1" checked/>
<div class="relative w-11 h-6 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:bg-primary after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:left-[22px]"></div>
</label>
</div>
</div>

<!-- Existing Announcements List Section (Sidebar) -->
<div class="bg-white p-4 sm:p-6 rounded-xl border border-outline-variant shadow-sm space-y-3">
    <h3 class="font-label-md text-sm text-on-surface border-b border-outline-variant pb-2 font-bold text-primary">Daftar Pengumuman</h3>
    <div class="space-y-2.5 max-h-[350px] overflow-y-auto pr-1">
        @forelse ($announcements as $announcement)
            <div class="p-3 bg-surface-container-low rounded-lg border border-outline-variant/50 flex flex-col sm:flex-row sm:items-center justify-between gap-2 group hover:bg-surface-container-high transition-colors">
                <div class="overflow-hidden min-w-0 flex-1">
                    <p class="font-semibold text-xs text-primary truncate" title="{{ $announcement->title }}">{{ $announcement->title }}</p>
                    <p class="text-[10px] text-on-surface-variant mt-0.5">
                        {{ $announcement->published_at ? \Carbon\Carbon::parse($announcement->published_at)->translatedFormat('d M Y') : $announcement->created_at->translatedFormat('d M Y') }}
                    </p>
                </div>
                <div class="flex items-center justify-between sm:justify-end gap-1.5 flex-shrink-0 pt-1 sm:pt-0 border-t sm:border-t-0 border-outline-variant/30">
                    <span class="px-2 py-0.5 rounded text-[9px] font-bold {{ $announcement->is_active ? 'bg-primary-container text-on-primary-container' : 'bg-outline-variant text-on-surface-variant' }}">
                        {{ $announcement->is_active ? 'Aktif' : 'Draft' }}
                    </span>
                    <div class="flex gap-1">
                        <button type="button" onclick="openEditAnnouncement({{ json_encode($announcement) }})" class="p-1 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Edit">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </button>
                        <button type="button" onclick="openDeleteAnnouncementDialog({{ $announcement->id }}, '{{ addslashes($announcement->title) }}')" class="p-1 text-error hover:bg-error/10 rounded-full transition-colors" title="Hapus">
                            <span class="material-symbols-outlined text-base">delete</span>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-xs text-on-surface-variant text-center py-4">Belum ada pengumuman.</p>
        @endforelse
    </div>
</div>

</div>
</div>
</div>

</form>
</main>
</div>

<!-- Modal: Confirmation Delete Announcement Dialog (Hidden by Default) -->
<div class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4" id="delete-announcement-dialog">
    <div class="fixed inset-0 bg-on-background/40 glass-overlay" onclick="closeDeleteAnnouncementDialog()"></div>
    <div class="relative bg-surface-container-lowest w-full max-w-md p-6 sm:p-8 rounded-2xl shadow-2xl border border-outline-variant animate-in fade-in zoom-in duration-200">
        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-error-container rounded-full flex items-center justify-center text-error mx-auto mb-4 sm:mb-6">
            <span class="material-symbols-outlined text-2xl sm:text-3xl">warning</span>
        </div>
        <h3 class="text-center font-headline-md text-lg sm:text-headline-md font-bold mb-2">Hapus Pengumuman?</h3>
        <p class="text-center text-on-surface-variant font-body-md text-xs sm:text-body-md mb-6 sm:mb-8">
            Apakah Anda yakin ingin menghapus pengumuman <span class="font-bold text-on-surface" id="announcement-title-to-delete">Judul Pengumuman</span>? Tindakan ini permanen dan tidak dapat dibatalkan.
        </p>
        <div class="flex gap-3 sm:gap-4">
            <button type="button" class="flex-1 py-2.5 sm:py-3 px-4 border border-outline-variant text-on-surface-variant rounded-xl font-label-md text-xs sm:text-label-md hover:bg-surface-container transition-colors" onclick="closeDeleteAnnouncementDialog()">
                Batal
            </button>
            <button type="button" class="flex-1 py-2.5 sm:py-3 px-4 bg-error text-on-error rounded-xl font-label-md text-xs sm:text-label-md hover:opacity-90 shadow-lg shadow-error/20 active:scale-95 transition-all" onclick="confirmDeleteAnnouncement()">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

<script src="{{ asset('js/image-cropper.js') }}"></script>
<script>
        // Micro-interactions and UI Logic
        function formatText(formatType) {
            const textarea = document.querySelector('textarea[name="content"]');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            const selectedText = text.substring(start, end);
            
            let replacement = '';
            if (formatType === 'bold') {
                replacement = `<strong>${selectedText}</strong>`;
            } else if (formatType === 'italic') {
                replacement = `<em>${selectedText}</em>`;
            } else if (formatType === 'underline') {
                replacement = `<u>${selectedText}</u>`;
            }
            
            textarea.value = text.substring(0, start) + replacement + text.substring(end);
            textarea.focus();
            textarea.setSelectionRange(start + replacement.length, start + replacement.length);
        }

        function openEditAnnouncement(announcement) {
            document.getElementById('announcement-id').value = announcement.id;
            document.getElementById('announcement-title').value = announcement.title;
            document.querySelector('input[name="slug"]').value = announcement.slug || '';
            document.querySelector('input[name="published_at"]').value = announcement.published_at ? announcement.published_at.substring(0, 10) : '';
            document.querySelector('textarea[name="content"]').value = announcement.content;
            document.querySelector('select[name="category"]').value = announcement.category;
            
            const checkbox = document.querySelector('input[name="is_active"]');
            if (checkbox) {
                checkbox.checked = announcement.is_active == 1;
            }
            
            // Image preview
            const imageContainer = document.getElementById('current-image-container');
            const imagePreview = document.getElementById('current-image-preview');
            if (announcement.image_path) {
                let path = announcement.image_path;
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
            
            // Change header and button text
            document.querySelector('header h2').textContent = 'Edit Announcement';
            document.getElementById('save-btn').textContent = 'Update Announcement';
            
            // Scroll smoothly to form top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        const saveBtn = document.getElementById('save-btn');
        const titleInput = document.getElementById('announcement-title');
        const errorTitle = document.getElementById('error-title');
        const form = document.getElementById('announcement-form');

        form.addEventListener('submit', (e) => {
            if (!titleInput.value) {
                e.preventDefault();
                titleInput.classList.add('border-error', 'ring-1', 'ring-error');
                errorTitle.classList.remove('hidden');
                
                // Shake effect
                titleInput.parentElement.classList.add('animate-shake');
                setTimeout(() => titleInput.parentElement.classList.remove('animate-shake'), 400);
                return;
            }

            titleInput.classList.remove('border-error', 'ring-1', 'ring-error');
            errorTitle.classList.add('hidden');

            saveBtn.innerHTML = '<span class="material-symbols-outlined animate-spin mr-2">progress_activity</span> Saving...';
        });

        // Add shake animation style
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
            .animate-shake { animation: shake 0.2s cubic-bezier(.36,.07,.19,.97) both; }
        `;
        document.head.appendChild(style);

        // Delete Announcement Dialog functions
        let announcementIdToDelete = null;

        function openDeleteAnnouncementDialog(id, title) {
            announcementIdToDelete = id;
            document.getElementById('announcement-title-to-delete').textContent = title;
            document.getElementById('delete-announcement-dialog').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDeleteAnnouncementDialog() {
            document.getElementById('delete-announcement-dialog').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function confirmDeleteAnnouncement() {
            if (!announcementIdToDelete) return;
            
            const btn = document.querySelector('#delete-announcement-dialog button:last-child');
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin mr-2">progress_activity</span> Deleting...';
            
            const form = document.createElement('form');
            form.action = "{{ url('/admin/announcements') }}/" + announcementIdToDelete;
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
        attachCropper(document.getElementById('announcement-image-input'), {
            aspectRatio: 16/9,
            previewImageElement: document.getElementById('current-image-preview')
        });
    });
</script>
</body></html>