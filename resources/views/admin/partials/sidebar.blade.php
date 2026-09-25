@props(['active' => 'dashboard'])

@php
    $navItems = [
        [
            'key' => 'dashboard',
            'label' => 'Dashboard',
            'icon' => 'dashboard',
            'url' => '/admin',
        ],
        [
            'key' => 'school_profile',
            'label' => 'School Profile',
            'icon' => 'school',
            'url' => '/admin/settings',
        ],
        [
            'key' => 'teachers',
            'label' => 'Teachers',
            'icon' => 'groups',
            'url' => '/admin/teachers',
        ],
        [
            'key' => 'announcements',
            'label' => 'Announcements',
            'icon' => 'campaign',
            'url' => '/admin/announcements',
        ],
        [
            'key' => 'events',
            'label' => 'Events',
            'icon' => 'event',
            'url' => '/admin/events',
        ],
        [
            'key' => 'achievements',
            'label' => 'Achievements',
            'icon' => 'military_tech',
            'url' => '/admin/achievements',
        ],
        [
            'key' => 'extracurriculars',
            'label' => 'Extracurricular',
            'icon' => 'sports_soccer',
            'url' => '/admin/extracurriculars',
        ],
        [
            'key' => 'faqs',
            'label' => 'FAQ',
            'icon' => 'quiz',
            'url' => '/admin/faqs',
        ],
        [
            'key' => 'hero_banners',
            'label' => 'Hero Banners',
            'icon' => 'image',
            'url' => '/admin/hero-banners',
        ],
        [
            'key' => 'virtual_tours',
            'label' => 'Virtual Tour',
            'icon' => 'vrpano',
            'url' => '/admin/virtual-tours',
        ],
    ];
@endphp

@php
    $sidebarLogo = \App\Models\Setting::get('school_logo');
    $sidebarLogoUrl = $sidebarLogo
        ? (filter_var($sidebarLogo, FILTER_VALIDATE_URL) ? $sidebarLogo : (\Illuminate\Support\Str::startsWith($sidebarLogo, ['/storage', 'storage']) ? asset($sidebarLogo) : asset('storage/' . ltrim($sidebarLogo, '/'))))
        : '/images/logo.png';
    $sidebarSchoolName = \App\Models\Setting::get('school_name', 'MI Darun Najah');
@endphp

<!-- Mobile Top Header Bar (BAR YANG KAYA = TAPI ADA 3) -->
<div class="fixed top-0 left-0 right-0 w-full z-30 lg:hidden bg-surface border-b border-outline-variant px-4 py-3 flex items-center justify-between shadow-sm">
    <div class="flex items-center gap-3">
        <button type="button" onclick="toggleSidebar()" class="p-2 text-primary hover:bg-primary-container/20 rounded-lg transition-colors flex items-center justify-center outline-none cursor-pointer">
            <span class="material-symbols-outlined text-2xl">menu</span>
        </button>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-white rounded-full overflow-hidden border border-outline-variant/40 shadow-sm p-0.5">
                <img src="{{ $sidebarLogoUrl }}" alt="{{ $sidebarSchoolName }}" class="w-full h-full object-contain"/>
            </div>
            <div>
                <h1 class="font-bold text-sm text-primary leading-tight">Admin Panel</h1>
                <p class="text-[9px] uppercase tracking-wider text-on-surface-variant font-bold leading-none">{{ $sidebarSchoolName }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Backdrop overlay for Mobile -->
<div id="sidebar-backdrop" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden transition-opacity" onclick="toggleSidebar()"></div>

<!-- Sidebar Navigation Drawer Shell -->
<aside id="admin-sidebar" class="fixed left-0 top-0 h-full w-64 bg-surface-container border-r border-outline-variant flex flex-col gap-base p-4 z-50 overflow-y-auto transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="mb-4 px-2 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full overflow-hidden flex-shrink-0 border border-outline-variant/40 shadow-sm p-1">
                <img src="{{ $sidebarLogoUrl }}" alt="{{ $sidebarSchoolName }}" class="w-full h-full object-contain"/>
            </div>
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-primary">Admin Panel</h1>
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">{{ $sidebarSchoolName }}</p>
            </div>
        </div>
        <button type="button" class="lg:hidden p-1.5 text-on-surface-variant hover:bg-surface-container-high rounded-full cursor-pointer" onclick="toggleSidebar()">
            <span class="material-symbols-outlined text-xl">close</span>
        </button>
    </div>
    <nav class="flex-1 space-y-1">
        @foreach($navItems as $item)
            @php $isActive = ($active === $item['key']); @endphp
            <a class="flex items-center gap-3 px-3 py-2.5 {{ $isActive ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-high' }} rounded-lg transition-transform hover:scale-[1.02] cursor-pointer active:scale-95" href="{{ $item['url'] }}">
                <span class="material-symbols-outlined" {!! $isActive ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>{{ $item['icon'] }}</span>
                <span class="font-label-md text-label-md">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>
    <div class="mt-auto pt-4 border-t border-outline-variant">
        <a class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-error text-on-error rounded-lg font-bold transition-all hover:bg-error/90 cursor-pointer" onclick="handleLogout(event)">
            <span class="material-symbols-outlined">logout</span>
            <span class="font-label-md text-label-md">Logout</span>
        </a>
    </div>
</aside>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('admin-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        if (!sidebar) return;
        
        const isHidden = sidebar.classList.contains('-translate-x-full');
        if (isHidden) {
            sidebar.classList.remove('-translate-x-full');
            if (backdrop) backdrop.classList.remove('hidden');
            document.body.classList.add('overflow-hidden', 'lg:overflow-auto');
        } else {
            sidebar.classList.add('-translate-x-full');
            if (backdrop) backdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden', 'lg:overflow-auto');
        }
    }

    function handleLogout(e) {
        if (e) e.preventDefault();
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/logout';
        const csrf = document.createElement('input');
        csrf.type = 'hidden';
        csrf.name = '_token';
        csrf.value = '{{ csrf_token() }}';
        form.appendChild(csrf);
        document.body.appendChild(form);
        form.submit();
    }
</script>
