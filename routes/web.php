<?php

use App\Http\Controllers\Acl\RoleController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\admin\notify\MailFileController;
use App\Http\Controllers\Admin\Notify\SmsController;
use App\Http\Controllers\Admin\Pages\About_usController;
use App\Http\Controllers\Admin\Pages\AdmissionController;
use App\Http\Controllers\Admin\Pages\ContactController;
use App\Http\Controllers\Admin\Pages\CourseController;
use App\Http\Controllers\Admin\Pages\LandingController;
use App\Http\Controllers\Admin\Pages\PartnerController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\Seo\Seo_ContactUsController;
use App\Http\Controllers\Admin\Seo\Seo_CourseController;
use App\Http\Controllers\Admin\Seo\Seo_PageController;
use App\Http\Controllers\Admin\Seo\Seo_registerController;
use App\Http\Controllers\Admin\Seo\Seo_whyUsController;
use App\Http\Controllers\Admin\SubmitFormController;
use App\Http\Controllers\Front\ChangeLangController;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('landing.index');
// })->name('landing');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/sitemap', function () {
    SitemapGenerator::create('https://beyond-universal.com')->writeToFile('sitemap.xml');
    return 'Sitemap generated';
});

Route::post('change-language', [ChangeLangController::class, "change"])->name('changeLang');
Route::post('register-form', [SubmitFormController::class, "register"])->name('register.form.submit');
Route::post('question-form', [SubmitFormController::class, "question"])->name('question.form.submit');

Route::group(['middleware' => ['local']], function ($local) {
    Route::get('/', [PagesController::class, 'landing'])->name('landing.en');
    Route::get('/contact_us', [PagesController::class, 'contact_us'])->name('contact_us.en');
    Route::get('/courses', [PagesController::class, 'courses'])->name('courses.en');
    Route::get('/course/{course:slug}', [PagesController::class, 'course'])->name('course.en');
    Route::get('/about-us', [PagesController::class, 'about'])->name('about.en');
    Route::get('/admissions', [PagesController::class, 'admissions'])->name('admissions.en');
    Route::get('/register', [PagesController::class, 'register'])->name('register.en');
    Route::get('/why-hit', [PagesController::class, 'why'])->name('why.en');

    // hungary language
    Route::group(['prefix' => 'hu'], function () {
        Route::get('/', [PagesController::class, 'landing'])->name('landing.hu');
        Route::get('/contact_us', [PagesController::class, 'contact_us'])->name('contact_us.hu');
        Route::get('/courses', [PagesController::class, 'courses'])->name('courses.hu');
        Route::get('/course/{course:slug}', [PagesController::class, 'course'])->name('course.hu');
        Route::get('/about-us', [PagesController::class, 'about'])->name('about.hu');
        Route::get('/admissions', [PagesController::class, 'admissions'])->name('admissions.hu');
        Route::get('/register', [PagesController::class, 'register'])->name('register.hu');
        Route::get('/why-hit', [PagesController::class, 'why'])->name('why.hu');
    });

});

// admin panel

Route::group(['prefix' => 'adpanel'], function () {
    Route::resource('roles', RoleController::class)->middleware('adminCheck');

    Route::group(
        ['middleware' => ['auth:sanctum', 'verified', 'adminCheck']],
        function () {
            Route::get('/', [IndexController::class, 'index'])->name(
                'admin.index'
            );
            Route::resource('landing', LandingController::class);
            Route::resource('contact_us', ContactController::class);
            Route::resource('course', CourseController::class);
            Route::resource('about-us', About_usController::class);
            Route::resource('partner', PartnerController::class);
            Route::resource('admission', AdmissionController::class);

            Route::resource('question', QuestionController::class)->only(['index', 'show']);
            Route::get('register-form-download/{register_form}', [RegisterController::class, 'download'])->name('register.form.download');
            Route::resource('register-form', RegisterController::class)->only('index', 'show');

            Route::group(['prefix' => 'seo'], function () {
                // for seo
                Route::resource('seo-all-pages', Seo_PageController::class)->except('show');
                Route::get('delete-seo/{seo}', [Seo_PageController::class, 'delete'])->name('delete-single-page');
                Route::resource('contact-us-page', Seo_ContactUsController::class)->except('show');
                Route::resource('register-page', Seo_registerController::class)->except('show');
                Route::resource('whyus-page', Seo_whyUsController::class)->except('show');
                Route::resource('course-page', Seo_CourseController::class)->except('show');;
                // setting
            });

            Route::put('users/admin/{user}', [
                UserController::class,
                'is_admin',
            ])->name('is_admin');
            Route::resource('users', UserController::class);

            // notify
            Route::resource('notify/sms', SmsController::class);
            Route::resource('notify/email', EmailController::class);

            Route::controller(MailFileController::class)->group(function () {
                Route::get('notify/email-file/{email}', 'index')->name(
                    'mail-file.index'
                );
                Route::get('notify/email-file/{email}/create', 'create')->name(
                    'mail-file.create'
                );
                Route::post('notify/email-file/{email}/store', 'store')->name(
                    'mail-file.store'
                );
                Route::get('notify/email-file/{file}/edit', 'edit')->name(
                    'mail-file.edit'
                );
                Route::put('notify/email-file/{file}/update', 'update')->name(
                    'mail-file.update'
                );
                Route::delete(
                    'notify/email-file/{file}/delete',
                    'destroy'
                )->name('mail-file.destroy');
            });

        }
    );
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
