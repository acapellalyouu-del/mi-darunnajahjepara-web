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

<!-- Sidebar Navigation Shell -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container border-r border-outline-variant flex flex-col gap-base p-4 z-50 overflow-y-auto">
    <div class="mb-6 px-2 py-4 flex items-center gap-3">
        <div class="w-10 h-10 bg-white rounded-full overflow-hidden flex-shrink-0 border border-outline-variant/40 shadow-sm p-1">
            <img src="/images/logo.png" alt="MI Darun Najah" class="w-full h-full object-contain"/>
        </div>
        <div>
            <h1 class="font-headline-sm text-headline-sm font-bold text-primary">Admin Panel</h1>
            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">MI Darun Najah</p>
        </div>
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
    <div class="mt-auto pt-6 border-t border-outline-variant">
        <a class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-error text-on-error rounded-lg font-bold transition-all hover:bg-error/90 cursor-pointer" onclick="handleLogout(event)">
            <span class="material-symbols-outlined">logout</span>
            <span class="font-label-md text-label-md">Logout</span>
        </a>
    </div>
</aside>
