<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Faq;
use App\Models\HeroBanner;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\VirtualTour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Fetch Banners
        $banners = HeroBanner::where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('start_date')
                  ->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>=', now());
            })
            ->orderBy('order')
            ->get();

        // 2. Fetch Announcements
        $announcements = Announcement::where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->latest()
            ->take(3)
            ->get();

        // 3. Fetch Next Featured Event for Countdown
        $featuredEvent = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->first();

        // If no upcoming events, fallback to the latest event
        if (!$featuredEvent) {
            $featuredEvent = Event::latest()->first();
        }

        // 4. Fetch Achievements
        $achievements = Achievement::latest()
            ->take(4)
            ->get();

        // 5. Fetch FAQs
        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->get();

        // 6. Fetch Teacher of the Month
        $teacherOfTheMonthId = Setting::get('teacher_of_the_month_id');
        $teacherOfTheMonth = null;
        if ($teacherOfTheMonthId) {
            $teacherOfTheMonth = Teacher::find($teacherOfTheMonthId);
        }

        // 7. General Settings Helper Array
        $settings = [
            'school_name' => Setting::get('school_name', 'MI Darun Najah'),
            'school_npsn' => Setting::get('school_npsn', '60721456 / Grade A'),
            'school_history' => Setting::get('school_history', 'Sejarah MI Darun Najah...'),
            'school_vision' => Setting::get('school_vision', 'Visi MI Darun Najah...'),
            'school_mission' => Setting::get('school_mission', 'Misi MI Darun Najah...'),
            'headmaster_name' => Setting::get('headmaster_name', 'Nama Kepala Sekolah'),
            'headmaster_photo' => Setting::get('headmaster_photo'),
            'headmaster_quote' => Setting::get('headmaster_quote', 'Mendidik dengan hati, membimbing dengan Al-Qur\'an.'),
            'headmaster_greeting' => Setting::get('headmaster_greeting', 'Teks Sambutan Kepala Sekolah...'),
            'contact_email' => Setting::get('contact_email', 'info@midarunnajah.sch.id'),
            'contact_phone' => Setting::get('contact_phone', '(021) 123456'),
            'contact_whatsapp' => Setting::get('contact_whatsapp', '+62 812 3456 7890'),
            'contact_hours' => Setting::get('contact_hours', 'Senin - Sabtu: 07.00 - 15.00 WIB'),
            'contact_address' => Setting::get('contact_address', 'Alamat Sekolah...'),
            'contact_maps' => Setting::get('contact_maps'),
            'contact_facebook' => Setting::get('contact_facebook', '#'),
            'contact_instagram' => Setting::get('contact_instagram', '#'),
            'contact_youtube' => Setting::get('contact_youtube', '#'),
            'announcement_bar_text' => Setting::get('announcement_bar_text'),
            'announcement_bar_link' => Setting::get('announcement_bar_link'),
            'announcement_bar_active' => Setting::get('announcement_bar_active', false),
        ];

        // 8. Fetch Teachers for Directory Preview
        $teachers = Teacher::where('is_active', true)
            ->orderBy('order')
            ->get();

        // 9. Fetch Active Virtual Tours
        $virtualTours = VirtualTour::where('is_active', true)
            ->orderBy('order')
            ->get();

        // 10. Fetch Extracurriculars
        $extracurriculars = \App\Models\Extracurricular::where('is_active', true)->get();

        return view('welcome', compact(
            'banners',
            'announcements',
            'featuredEvent',
            'achievements',
            'faqs',
            'teacherOfTheMonth',
            'settings',
            'teachers',
            'virtualTours',
            'extracurriculars'
        ));
    }

    public function achievements(Request $request)
    {
        $category = $request->query('category');
        $year = $request->query('year');

        $query = Achievement::query();

        if ($category && $category !== 'all') {
            if ($category === 'Akademik' || $category === 'Academic') {
                $query->where(function($q) {
                    $q->where('category', 'like', '%academic%')
                      ->orWhere('category', 'like', '%akademik%');
                });
            } else {
                $query->where(function($q) {
                    $q->where('category', 'not' , 'like', '%academic%')
                      ->where('category', 'not', 'like', '%akademik%');
                });
            }
        }

        if ($year && $year !== 'all') {
            $query->whereYear('date', $year);
        }

        $achievements = $query->orderBy('date', 'desc')->paginate(9);

        $settings = [
            'school_name' => Setting::get('school_name', 'MI Darun Najah'),
            'contact_email' => Setting::get('contact_email', 'info@midarunnajah.sch.id'),
            'contact_phone' => Setting::get('contact_phone', '(021) 123456'),
            'contact_address' => Setting::get('contact_address', 'Alamat Sekolah...'),
            'announcement_bar_text' => Setting::get('announcement_bar_text'),
            'announcement_bar_link' => Setting::get('announcement_bar_link'),
            'announcement_bar_active' => Setting::get('announcement_bar_active', false),
        ];

        return view('achievements', compact('achievements', 'settings'));
    }

    public function teacherProfile($id)
    {
        $teacher = Teacher::findOrFail($id);

        $settings = [
            'school_name' => Setting::get('school_name', 'MI Darun Najah'),
            'contact_email' => Setting::get('contact_email', 'info@midarunnajah.sch.id'),
            'contact_phone' => Setting::get('contact_phone', '(021) 123456'),
            'contact_address' => Setting::get('contact_address', 'Alamat Sekolah...'),
            'announcement_bar_text' => Setting::get('announcement_bar_text'),
            'announcement_bar_link' => Setting::get('announcement_bar_link'),
            'announcement_bar_active' => Setting::get('announcement_bar_active', false),
        ];

        return view('teacher_profile', compact('teacher', 'settings'));
    }

    public function virtualTour()
    {
        return view('virtual_tour');
    }
}
