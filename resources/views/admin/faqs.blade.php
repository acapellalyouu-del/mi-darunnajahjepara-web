<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>FAQ Management - MI Darun Najah Admin</title>
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
@include('admin.partials.sidebar', ['active' => 'faqs'])

<!-- Main Content Area -->
<main class="ml-64 min-h-screen flex flex-col bg-white justify-center items-center p-8">
    <div class="text-center max-w-md p-10 rounded-2xl border border-outline-variant/60 shadow-sm bg-surface-container-lowest">
        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary">
            <span class="material-symbols-outlined text-4xl">engineering</span>
        </div>
        <h2 class="font-headline-md text-2xl font-bold text-primary mb-2">Under Maintenance</h2>
        <p class="text-on-surface-variant font-body-md text-sm leading-relaxed">
            Halaman Manajemen FAQ saat ini sedang dalam tahap pemeliharaan sistem.
        </p>
    </div>
</main>

<!-- Delete Dialog -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden" id="delete-dialog">
    <div class="bg-surface rounded-2xl p-6 max-w-md w-full border border-outline-variant shadow-xl">
        <h3 class="font-headline-md text-headline-md text-primary mb-2">Hapus FAQ</h3>
        <p class="font-body-md text-on-surface-variant mb-6">Apakah Anda yakin ingin menghapus FAQ <span class="font-bold text-on-surface" id="faq-question-to-delete"></span>? Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex justify-end gap-4">
            <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="closeDeleteDialog()">Batal</button>
            <button class="bg-error text-on-error px-6 py-2.5 rounded-lg font-label-md shadow-lg shadow-error/20 hover:opacity-90 transition-all" onclick="confirmDelete()">Hapus FAQ</button>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden overflow-y-auto" id="add-modal">
    <div class="bg-surface rounded-2xl border border-outline-variant max-w-2xl w-full shadow-2xl overflow-hidden my-8">
        <div class="p-6 border-b border-outline-variant bg-surface-container-low flex justify-between items-center">
            <h3 class="font-headline-md text-headline-md text-primary font-bold" id="modal-title">Add New FAQ</h3>
            <button class="text-on-surface-variant hover:text-on-surface" onclick="document.getElementById('add-modal').classList.add('hidden')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="/admin/faqs" method="POST" class="p-6 space-y-6">
            @csrf
            <input type="hidden" name="id" id="faq-id">

            <div>
                <label class="block text-label-sm font-bold uppercase text-on-surface-variant mb-2">Question</label>
                <input class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary outline-none text-body-md" id="faq-question" name="question" required placeholder="Enter the frequently asked question..." type="text">
            </div>

            <div>
                <label class="block text-label-sm font-bold uppercase text-on-surface-variant mb-2">Answer</label>
                <textarea class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary outline-none text-body-md" id="faq-answer" name="answer" required placeholder="Provide a detailed answer..." rows="4"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-label-sm font-bold uppercase text-on-surface-variant mb-2">Category</label>
                    <select class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary outline-none text-body-md" id="faq-category" name="category">
                        <option value="Admissions">Admissions</option>
                        <option value="Academic">Academic</option>
                        <option value="Facilities">Facilities</option>
                        <option value="Financial">Financial</option>
                    </select>
                </div>
                <div>
                    <label class="block text-label-sm font-bold uppercase text-on-surface-variant mb-2">Display Order</label>
                    <input class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary outline-none text-body-md" id="faq-order" name="order" type="number" value="1">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="faq-active" value="1" checked class="rounded border-outline-variant text-primary focus:ring-primary">
                <label for="faq-active" class="font-label-sm text-label-sm text-on-surface-variant">FAQ Aktif (Tampilkan di web)</label>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-outline-variant">
                <button class="px-6 py-2.5 text-on-surface-variant font-label-md" onclick="document.getElementById('add-modal').classList.add('hidden')" type="button">Cancel</button>
                <button class="bg-primary text-on-primary px-8 py-2.5 rounded-lg font-label-md shadow-lg shadow-primary/20 hover:opacity-90 transition-all" type="submit" id="submit-button">Save FAQ</button>
            </div>
        </form>
    </div>
</div>

<script>
    let faqIdToDelete = null;

    function openDeleteDialog(id, question) {
        faqIdToDelete = id;
        document.getElementById('faq-question-to-delete').textContent = question;
        document.getElementById('delete-dialog').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteDialog() {
        document.getElementById('delete-dialog').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function confirmDelete() {
        if (!faqIdToDelete) return;
        
        const form = document.createElement('form');
        form.action = "{{ url('/admin/faqs') }}/" + faqIdToDelete;
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
        document.getElementById('modal-title').textContent = 'Add New FAQ';
        document.getElementById('faq-id').value = '';
        document.getElementById('faq-question').value = '';
        document.getElementById('faq-answer').value = '';
        document.getElementById('faq-category').value = 'Admissions';
        document.getElementById('faq-order').value = 1;
        document.getElementById('faq-active').checked = true;
        document.getElementById('submit-button').textContent = 'Save FAQ';
        document.getElementById('add-modal').classList.remove('hidden');
    }

    function openEditModal(faq) {
        document.getElementById('modal-title').textContent = 'Edit FAQ';
        document.getElementById('faq-id').value = faq.id;
        document.getElementById('faq-question').value = faq.question;
        document.getElementById('faq-answer').value = faq.answer;
        document.getElementById('faq-category').value = faq.category;
        document.getElementById('faq-order').value = faq.order;
        document.getElementById('faq-active').checked = faq.is_active == 1;

        document.getElementById('submit-button').textContent = 'Update FAQ';
        document.getElementById('add-modal').classList.remove('hidden');
    }

    // Live search and filter logic
    const searchInput = document.getElementById('faqs-search');
    searchInput.addEventListener('input', filterTable);

    function filterTable() {
        const query = searchInput.value.toLowerCase().trim();
        const categoryFilter = document.getElementById('category-filter').value;
        const rows = document.querySelectorAll('.faq-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const question = row.getAttribute('data-question');
            const answer = row.getAttribute('data-answer');
            const category = row.getAttribute('data-category');

            const queryMatch = question.includes(query) || answer.includes(query);
            const categoryMatch = categoryFilter === 'all' || category === categoryFilter;

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
</script>
</body>
</html>
