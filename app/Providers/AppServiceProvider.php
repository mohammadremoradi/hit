<?php

namespace App\Providers;

use App\Models\Admin\Pages\Contact;
use App\Models\Admin\Pages\Course;
use App\Models\Admin\Seo\SeoPage;
use App\Models\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(['front.layouts.topNav', 'front.layouts.footer', 'front.layouts.mainNav'], function ($view) {
            $contact = cache()->remember('contact', 600, function () {
                return Contact::first();
            });

            $view->with([
                'phone_one' => $contact->phone_one,
                'phone_two' => $contact->phone_two,
                'email' => $contact->email,
                'logo' => $contact->logo,
                'logo_color' => $contact->logo_color,
                'instagram' => $contact->instagram,
                'telegram' => $contact->telegram,
                'youtube' => $contact->youtube,
                'twitter' => $contact->twitter,
                'address' => $contact->address,
            ]);
        });

        view()->composer(['front.layouts.mainNav'], function ($view) {
            $lang = App::getLocale();
            $courses = Cache::remember('courses' . $lang, 600, function () {
                $lang = App::getLocale();
                return Course::where('lang', $lang)->orderBy('id', 'desc')->get();
            });
            $view->with([
                'courses' => $courses,
            ]);
        });
        view()->composer(['admin.layouts.header'], function ($view) {
            $message = Notification::where('read_at', null)->get();
            $registers = Notification::where('read_at', null)->where('notifiable_type' , 'App\Models\Admin\Register')->get();
            $question = Notification::where('read_at', null)->where('notifiable_type' , 'App\Models\Admin\Question')->get();
            $view->with([
                'messages' => $message,
                'registers' => $registers,
                'question' => $question,
            ]);
        });

        view()->composer(['front.layouts.master'], function ($view) {

            $lang = App::getLocale();
            $all_script_langs = Cache::remember('all-script-' . $lang, 600, function () {
                $lang = App::getLocale();
                return SeoPage::where('lang', $lang)->orderBy('id', 'desc')->get();
            });
            $all_scripts = Cache::remember('all-script', 600, function () {
                return SeoPage::where('lang', 'both')->orderBy('id', 'desc')->get();
            });

            $view->with([
                'all_script_langs' => $all_script_langs,
                'all_scripts' => $all_scripts,
            ]);

        });

    }
}
