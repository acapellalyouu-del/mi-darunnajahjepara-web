<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\HeroBanner;
use App\Models\VirtualTour;
use App\Models\Extracurricular;
use App\Models\Faq;

class AdminController extends Controller
{
    public function dashboard()
    {
        \Illuminate\Support\Facades\Log::info('Dashboard request - Session ID: ' . session()->getId() . ' | Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        $teachersCount = Teacher::count();
        $upcomingEventsCount = Event::where('event_date', '>=', now())->count();
        $achievementsCount = Achievement::count();
        $activeAnnouncementsCount = Announcement::where('is_active', true)->count();

        // Dynamic recent activities feed from actual database records
        $activities = collect();

        Announcement::latest()->take(3)->get()->each(function ($item) use ($activities) {
            $activities->push([
                'title' => 'Pengumuman dipublikasi: "' . $item->title . '"',
                'time' => $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja',
                'timestamp' => $item->created_at ?? now(),
                'user' => 'Admin',
                'icon' => 'campaign',
                'bg' => 'bg-tertiary-container text-on-tertiary-container',
                'url' => '/admin/announcements'
            ]);
        });

        Teacher::latest()->take(3)->get()->each(function ($item) use ($activities) {
            $activities->push([
                'title' => 'Guru didaftarkan: "' . $item->name . '"',
                'time' => $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja',
                'timestamp' => $item->created_at ?? now(),
                'user' => 'Admin',
                'icon' => 'person_add',
                'bg' => 'bg-primary-container text-on-primary-container',
                'url' => '/admin/teachers'
            ]);
        });

        Event::latest()->take(3)->get()->each(function ($item) use ($activities) {
            $activities->push([
                'title' => 'Kegiatan dibuat: "' . $item->title . '"',
                'time' => $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja',
                'timestamp' => $item->created_at ?? now(),
                'user' => 'Admin',
                'icon' => 'event',
                'bg' => 'bg-tertiary/10 text-tertiary',
                'url' => '/admin/events'
            ]);
        });

        Achievement::latest()->take(3)->get()->each(function ($item) use ($activities) {
            $activities->push([
                'title' => 'Prestasi ditambahkan: "' . $item->title . '"',
                'time' => $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja',
                'timestamp' => $item->created_at ?? now(),
                'user' => 'Admin',
                'icon' => 'military_tech',
                'bg' => 'bg-secondary-container text-on-secondary-container',
                'url' => '/admin/achievements'
            ]);
        });

        $recentActivities = $activities->sortByDesc('timestamp')->take(3)->values();

        return view('admin.dashboard', compact(
            'teachersCount',
            'upcomingEventsCount',
            'achievementsCount',
            'activeAnnouncementsCount',
            'recentActivities'
        ));
    }

    public function teachers()
    {
        \Illuminate\Support\Facades\Log::info('Teachers request - Session ID: ' . session()->getId() . ' | Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        $teachers = Teacher::orderBy('order')->get();
        
        $settingsRaw = Setting::whereIn('key', ['headmaster_name', 'headmaster_photo', 'headmaster_quote', 'headmaster_greeting'])->get();
        $settings = [];
        foreach ($settingsRaw as $s) {
            $settings[$s->key] = $s->value;
        }
        if (!isset($settings['headmaster_name'])) $settings['headmaster_name'] = 'Dr. H. Ahmad Fauzi, M.Pd.';
        if (!isset($settings['headmaster_quote'])) $settings['headmaster_quote'] = 'Mendidik dengan hati, membimbing dengan Al-Qur\'an.';

        return view('admin.teachers', compact('teachers', 'settings'));
    }

    public function storeTeacher(Request $request)
    {
        if ($request->id === 'headmaster') {
            $request->validate([
                'name' => 'required|string|max:255',
                'quote' => 'required|string',
                'photo' => 'nullable|image|max:5120',
            ]);
            Setting::updateOrCreate(['key' => 'headmaster_name'], ['value' => $request->name]);
            Setting::updateOrCreate(['key' => 'headmaster_quote'], ['value' => $request->quote]);
            if ($request->hasFile('photo')) {
                $photoPath = '/storage/' . $request->file('photo')->store('settings', 'public');
                Setting::updateOrCreate(['key' => 'headmaster_photo'], ['value' => $photoPath]);
            }
            return redirect('/admin/teachers')->with('success', 'Kepala Sekolah successfully updated!');
        }

        $request->validate([
            'id' => 'nullable|integer|exists:teachers,id',
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'role' => 'nullable|string|max:100',
            'photo' => 'nullable|image|max:5120', // Max 5MB
            'order' => 'nullable|integer',
            'quote' => 'nullable|string',
            'bio' => 'nullable|string',
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
        ]);

        $id = $request->id;
        $teacher = $id ? Teacher::findOrFail($id) : new Teacher();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('teachers', 'public');
            $teacher->photo_path = $photoPath;
        }

        $teacher->name = $request->name;
        $teacher->nip = $request->nip;
        $teacher->subject = $request->subject;
        $teacher->role = $request->role ?? 'Guru';
        $teacher->quote = $request->quote;
        $teacher->bio = $request->bio;
        $teacher->education = $request->education;
        $teacher->experience = $request->experience;
        $teacher->is_active = true;

        if ($request->has('order') && $request->order !== null) {
            $teacher->order = (int) $request->order;
        } elseif (!$id) {
            $teacher->order = Teacher::count() + 1;
        }

        $teacher->save();

        $message = $id ? 'Profil guru berhasil diperbarui!' : 'Guru berhasil ditambahkan!';
        return redirect()->back()->with('success', $message);
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus!');
    }

    public function toggleTeacherActive($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->is_active = !$teacher->is_active;
        $teacher->save();

        return response()->json([
            'success' => true,
            'is_active' => $teacher->is_active
        ]);
    }

    public function announcements()
    {
        \Illuminate\Support\Facades\Log::info('Announcements request - Session ID: ' . session()->getId() . ' | Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        $announcements = Announcement::latest()->get();
        return view('admin.announcements', compact('announcements'));
    }

    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:announcements,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:10240', // Max 10MB
            'published_at' => 'nullable|date',
        ]);

        $id = $request->id;
        $announcement = $id ? Announcement::findOrFail($id) : new Announcement();

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        
        // Ensure slug is unique, excluding itself
        $originalSlug = $slug;
        $count = 1;
        while (Announcement::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        if ($request->hasFile('image')) {
            $announcement->image_path = '/storage/' . $request->file('image')->store('announcements/banners', 'public');
        }

        $publishedAt = $request->published_at ? \Carbon\Carbon::parse($request->published_at) : now();

        $announcement->title = $request->title;
        $announcement->slug = $slug;
        $announcement->content = $request->content;
        $announcement->category = $request->category;
        $announcement->read_time = 3; // Default default read time
        $announcement->is_active = $request->has('is_active') ? (bool) $request->is_active : true;
        $announcement->published_at = $publishedAt;
        $announcement->save();

        $message = $id ? 'Pengumuman berhasil diperbarui!' : 'Pengumuman berhasil dipublikasikan!';
        return redirect('/admin/announcements')->with('success', $message);
    }

    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus!');
    }

    public function showLoginForm()
    {
        \Illuminate\Support\Facades\Log::info('ShowLoginForm request - Session ID: ' . session()->getId() . ' | Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        $school_name = Setting::get('school_name', 'MI Darun Najah');
        return view('auth.login', compact('school_name'));
    }

    public function login(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Login submit request - Session ID: ' . session()->getId());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Email address or password is incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function heroBanners(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('HeroBanners request - Session ID: ' . session()->getId() . ' | Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        
        $banners = HeroBanner::orderBy('order')->get();
        $editBanner = null;
        if ($request->has('edit')) {
            $editBanner = HeroBanner::find($request->edit);
        }

        return view('admin.hero_banners', compact('banners', 'editBanner'));
    }

    public function storeHeroBanner(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:hero_banners,id',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:10240', // Max 10MB
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $id = $request->id;
        $banner = $id ? HeroBanner::findOrFail($id) : new HeroBanner();

        if ($request->hasFile('image')) {
            $imagePath = '/storage/' . $request->file('image')->store('hero-banners', 'public');
            $banner->image_path = $imagePath;
        } elseif (!$id) {
            // New banner requires an image
            return redirect()->back()->withErrors(['image' => 'Please upload a background image for the banner.']);
        }

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->start_date = $request->start_date;
        $banner->end_date = $request->end_date;
        $banner->is_active = $request->has('is_active') ? (bool) $request->is_active : true;
        if (!$id) {
            $banner->order = HeroBanner::count() + 1;
        }
        $banner->save();

        return redirect('/admin/hero-banners')->with('success', 'Hero banner successfully saved!');
    }

    public function deleteHeroBanner($id)
    {
        $banner = HeroBanner::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Hero banner deleted successfully!');
    }

    public function virtualTours(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('VirtualTours request - Session ID: ' . session()->getId() . ' | Auth check: ' . (Auth::check() ? 'YES' : 'NO'));
        
        $locations = VirtualTour::orderBy('order')->get();
        $editLocation = null;
        if ($request->has('edit')) {
            $editLocation = VirtualTour::find($request->edit);
        }

        return view('admin.virtual_tours', compact('locations', 'editLocation'));
    }

    public function storeVirtualTour(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:virtual_tours,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media_type' => 'required|string|in:360_panorama,gallery',
            'images.*' => 'image|max:10240', // Max 10MB per image
        ]);

        $id = $request->id;
        $tour = $id ? VirtualTour::findOrFail($id) : new VirtualTour();

        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->media_type = $request->media_type;
        $tour->is_active = $request->has('is_active') ? (bool) $request->is_active : true;

        $existingImages = $id ? ($tour->image_paths ?? []) : [];
        $newImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $newImages[] = '/storage/' . $file->store('virtual-tours', 'public');
            }
        }

        if ($request->media_type === '360_panorama') {
            if (!empty($newImages)) {
                $tour->image_paths = [$newImages[0]];
            } elseif (!$id) {
                return redirect()->back()->withErrors(['images' => 'Please upload a 360 panorama image.']);
            }
        } else {
            if ($request->has('clear_existing') && $request->clear_existing) {
                $tour->image_paths = $newImages;
            } else {
                // Put new images first so they automatically shift/replace existing images
                $tour->image_paths = array_merge($newImages, $existingImages);
            }
            if (empty($tour->image_paths) && !$id) {
                return redirect()->back()->withErrors(['images' => 'Please upload at least one image.']);
            }
        }

        if (!$id) {
            $tour->order = VirtualTour::count() + 1;
        }
        $tour->save();

        return redirect('/admin/virtual-tours')->with('success', 'Virtual tour location saved successfully!');
    }

    public function pinVirtualTour($id)
    {
        $tour = VirtualTour::findOrFail($id);

        // Re-sequence all tours so that the pinned tour gets order = 1 (top preview)
        $tours = VirtualTour::orderBy('order', 'asc')->get();
        $counter = 2;
        foreach ($tours as $t) {
            if ($t->id == $id) {
                $t->order = 1;
            } else {
                $t->order = $counter++;
            }
            $t->save();
        }

        return redirect()->back()->with('success', '"' . $tour->name . '" berhasil disetel sebagai Gambar Preview / Header Utama Website!');
    }

    public function deleteVirtualTour($id)
    {
        $tour = VirtualTour::findOrFail($id);
        $tourName = $tour->name;
        $tour->delete();

        // Re-sequence remaining tours
        $remainingTours = VirtualTour::orderBy('order', 'asc')->get();
        foreach ($remainingTours as $index => $t) {
            $t->order = $index + 1;
            $t->save();
        }

        return redirect()->back()->with('success', 'Lokasi "' . $tourName . '" berhasil dihapus!');
    }

    public function extracurriculars()
    {
        $extracurriculars = Extracurricular::orderBy('id', 'desc')->get();
        return view('admin.extracurriculars', compact('extracurriculars'));
    }

    public function storeExtracurricular(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:extracurriculars,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:10240', // Max 10MB
            'coach_name' => 'required|string|max:255',
            'coach_role' => 'nullable|string|max:255',
            'coach_photo' => 'nullable|image|max:5120', // Max 5MB
            'schedule' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $id = $request->id;
        $extra = $id ? Extracurricular::findOrFail($id) : new Extracurricular();

        if ($request->hasFile('image')) {
            $extra->image_path = '/storage/' . $request->file('image')->store('extracurriculars', 'public');
        } elseif (!$id) {
            // New requires image
            return redirect()->back()->withErrors(['image' => 'Please upload a background image for the extracurricular activity.']);
        }

        if ($request->hasFile('coach_photo')) {
            $extra->coach_photo_path = '/storage/' . $request->file('coach_photo')->store('coaches', 'public');
        }

        $extra->name = $request->name;
        $extra->slug = Str::slug($request->name);
        $extra->description = $request->description;
        $extra->category = $request->category;
        $extra->coach_name = $request->coach_name;
        $extra->coach_role = $request->coach_role;
        $extra->schedule = $request->schedule;
        $extra->location = $request->location;
        $extra->is_active = $request->has('is_active') ? (bool) $request->is_active : true;
        $extra->is_featured = $request->has('is_featured') ? (bool) $request->is_featured : false;
        $extra->save();

        $message = $id ? 'Extracurricular activity successfully updated!' : 'Extracurricular activity successfully created!';
        return redirect('/admin/extracurriculars')->with('success', $message);
    }

    public function deleteExtracurricular($id)
    {
        $extra = Extracurricular::findOrFail($id);
        $extra->delete();
        return redirect('/admin/extracurriculars')->with('success', 'Extracurricular activity successfully deleted!');
    }

    public function achievements()
    {
        $achievements = Achievement::orderBy('date', 'desc')->get();
        return view('admin.achievements', compact('achievements'));
    }

    public function storeAchievement(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:achievements,id',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'achiever_name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240', // Max 10MB
            'status' => 'required|string|in:Published,Draft',
            'is_featured' => 'nullable|boolean',
        ]);

        $id = $request->id;
        $achievement = $id ? Achievement::findOrFail($id) : new Achievement();

        if ($request->hasFile('image')) {
            $achievement->image_path = '/storage/' . $request->file('image')->store('achievements', 'public');
        } elseif (!$id) {
            $achievement->image_path = 'https://images.unsplash.com/photo-1578575437130-527eed3abbec';
        }

        $achievement->title = $request->title;
        $achievement->category = $request->category;
        $achievement->rank = $request->rank;
        $achievement->achiever_name = $request->achiever_name;
        $achievement->date = $request->date;
        $achievement->description = $request->description;
        $achievement->status = $request->status;
        $achievement->is_featured = $request->has('is_featured') ? (bool) $request->is_featured : false;
        $achievement->save();

        $message = $id ? 'Achievement successfully updated!' : 'Achievement successfully created!';
        return redirect('/admin/achievements')->with('success', $message);
    }

    public function deleteAchievement($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return redirect('/admin/achievements')->with('success', 'Achievement successfully deleted!');
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('order', 'asc')->get();
        return view('admin.faqs', compact('faqs'));
    }

    public function storeFaq(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:faqs,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $id = $request->id;
        $faq = $id ? Faq::findOrFail($id) : new Faq();

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->category = $request->category;
        $faq->order = $request->order;
        $faq->is_active = $request->has('is_active') ? (bool) $request->is_active : true;
        $faq->save();

        $message = $id ? 'FAQ successfully updated!' : 'FAQ successfully created!';
        return redirect('/admin/faqs')->with('success', $message);
    }

    public function deleteFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect('/admin/faqs')->with('success', 'FAQ successfully deleted!');
    }

    public function settings()
    {
        $settingsRaw = Setting::all();
        $settings = [];
        foreach ($settingsRaw as $s) {
            $settings[$s->key] = $s->value;
        }
        return view('admin.school_profile', compact('settings'));
    }

    public function storeSettings(Request $request)
    {
        $data = $request->except('_token');

        if ($request->has('contact_maps')) {
            $mapsUrl = $request->input('contact_maps');
            if (preg_match('/src="([^"]+)"/', $mapsUrl, $matches)) {
                $data['contact_maps'] = $matches[1];
            }
        }

        if ($request->hasFile('school_logo')) {
            $path = '/storage/' . $request->file('school_logo')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'school_logo'], ['value' => $path]);
        }

        if ($request->hasFile('school_cover_image')) {
            $path = '/storage/' . $request->file('school_cover_image')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'school_cover_image'], ['value' => $path]);
        }

        if ($request->hasFile('headmaster_photo')) {
            $path = '/storage/' . $request->file('headmaster_photo')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'headmaster_photo'], ['value' => $path]);
        }

        foreach ($data as $key => $value) {
            if ($key !== 'school_logo' && $key !== 'school_cover_image' && $key !== 'headmaster_photo') {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect('/admin/settings')->with('success', 'School profile successfully updated!');
    }

    public function events()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.events', compact('events'));
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer|exists:events,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:10240', // Max 10MB
            'is_featured' => 'nullable|boolean',
        ]);

        $id = $request->id;
        $event = $id ? Event::findOrFail($id) : new Event();

        if ($request->hasFile('image')) {
            $event->image_path = '/storage/' . $request->file('image')->store('events', 'public');
        }

        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        
        // Ensure slug is unique
        $originalSlug = $event->slug;
        $count = 1;
        while (Event::where('slug', $event->slug)->where('id', '!=', $id)->exists()) {
            $event->slug = $originalSlug . '-' . $count;
            $count++;
        }

        $event->description = $request->description;
        $event->event_date = \Carbon\Carbon::parse($request->event_date);
        $event->location = $request->location;
        $event->is_featured = $request->has('is_featured') ? (bool) $request->is_featured : false;
        $event->save();

        $message = $id ? 'Event successfully updated!' : 'Event successfully created!';
        return redirect('/admin/events')->with('success', $message);
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('/admin/events')->with('success', 'Event successfully deleted!');
    }
}
