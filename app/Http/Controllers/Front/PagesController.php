<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pages\About_us;
use App\Models\Admin\Pages\Admission;
use App\Models\Admin\Pages\Contact;
use App\Models\Admin\Pages\Course;
use App\Models\Admin\Pages\Landing;
use App\Models\Admin\Pages\Partner;
use App\Models\Admin\Seo\Seo_ContactUs;
use App\Models\Admin\Seo\Seo_Course;
use App\Models\Admin\Seo\Seo_register;
use App\Models\Admin\Seo\Seo_whyUs;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{

    public function landing()
    {
        //  for day cache 60*60*24
        $lang = App::getLocale();
        $landing = Cache::remember('landing-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Landing::where('lang', $lang)->first();
        });
        $logo_color = Cache::remember('logo_color' . $lang, 600, function () {
            return Contact::value('logo_color');
        });
        if ($landing == null) {
            return to_route('landing.en');
        }
        $courses = Cache::remember('landing-courses-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Course::where('lang', $lang)->orderBy('id', 'desc')->take(3)->get();
        });
        $seos = Cache::remember('landing-seo-' . $lang, 600, function () {
            $lang = App::getLocale();
            $landing = Cache::get('landing-' . $lang);
            return $landing->seos;
        });

        SEOTools::setTitle($landing->title);
        SEOTools::setDescription($landing->description);
        SEOTools::jsonLd()->addImage($logo_color);

        return view('front.index', compact(['landing', 'logo_color', 'courses', 'seos']));
    }

    public function contact_us()
    {
        $lang = App::getLocale();
        $contacts = Cache::remember('contact-us-seo-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Seo_ContactUs::where('lang', $lang)->get();
        });

        $contact_us = Cache::remember('contact_us', 600, function () {
            return Contact::first();
        });

        if ($contacts == null) {
            return to_route('contact_us.en');
        }
        return view('front.pages.contact_us', compact('contact_us', 'contacts'));

    }

    public function course(Course $course)
    {

        SEOTools::setTitle($course->title);
        SEOTools::setDescription($course->description);
        return view('front.pages.courses.course', compact('course'));

    }

    public function courses()
    {
        $lang = App::getLocale();
        $courses = Cache::remember('courses-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Course::where('lang', $lang)->orderBy('id', 'desc')->get();
        });

        $seo_courses = Cache::remember('seo_courses' . $lang, 600, function () {
            $lang = App::getLocale();
            return Seo_Course::where('lang', $lang)->get();
        });

        $contact = cache()->remember('contact', 600, function () {
            return Contact::first();
        });

        return view('front.pages.courses.courses', compact('courses', 'contact', 'seo_courses'));

    }

    public function about()
    {
        $lang = App::getLocale();
        $about = Cache::remember('aboutus-' . $lang, 600, function () {
            $lang = App::getLocale();
            return About_us::where('lang', $lang)->first();
        });

        $seos = Cache::remember('about-us-seo-' . $lang, 600, function () {
            $lang = App::getLocale();
            $about_us = Cache::get('aboutus-' . $lang);
            return $about_us->seos;
        });

        $partners = Partner::all();
        SEOTools::setTitle($about->title);
        SEOTools::setDescription($about->description);
        return view('front.pages.about_us', compact('about', 'partners', 'seos'));

    }

    public function admissions()
    {
        $lang = App::getLocale();
        $admission = Cache::remember('admission-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Admission::where('lang', $lang)->first();
        });

        if ($admission == null) {
            return to_route('admissions.en');
        }

        $seos = Cache::remember('admission-seo-' . $lang, 600, function () {
            $lang = App::getLocale();
            $admission = Cache::get('admission-' . $lang);
            if ($admission) {
                return $admission->seos;
            }
        });
        SEOTools::setTitle($admission->title);
        SEOTools::setDescription($admission->description);
        // OpenGraph::addImage($post->cover->url);
        return view('front.pages.admissions', compact('admission', 'seos'));
    }

    public function register()
    {
        $lang = App::getLocale();
        $seos = Cache::remember('register-form-seo-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Seo_register::where('lang', $lang)->get();
        });

        $contact = Cache::remember('contact_us', 600, function () {
            return Contact::first();
        });
        $programs = Cache::remember('programs', 600, function () {
            return Course::all();
        });


        return view('front.pages.register', compact('seos', 'contact', 'programs'));
    }
    public function why()
    {
        $lang = App::getLocale();
        $seos = Cache::remember('why-page-seo-' . $lang, 600, function () {
            $lang = App::getLocale();
            return Seo_whyUs::where('lang', $lang)->get();
        });

        return view('front.pages.why_hit', compact('seos'));
    }

}
