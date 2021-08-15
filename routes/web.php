<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (config('app.env') !== 'local') {
    Route::get('/dump-autoload', function() {
        $exitCode = Artisan::call('dump-autoload');
        echo $exitCode;
    });
    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        echo $exitCode;
    });
    Route::get('/clear-config', function() {
        $exitCode = Artisan::call('config:clear');
        echo "config reset";
    });
    Route::get('/clear-view', function() {
        $exitCode = Artisan::call('view:clear');
        echo "view reset";
    });
}



Route::get('/', 'FrontendController@index')->name('home');
Route::get('/news', 'FrontendController@news')->name('news');
Route::get('/subscribersstore', 'FrontendController@subscribersStore')->name('subscribersstore');
Route::get('/subscribers-store-confirm/{email}', 'FrontendController@subscribersStoreConfirm')->name('subscribers-store-confirm');
Route::get('/article/{blog}', 'FrontendController@article')->name('article');
Route::get('/courses', 'FrontendController@courses')->name('courses');
Route::get('/subcourses/{subclass}', 'FrontendController@subcourses')->name('subcourses');
Route::get('/course/{subclass}', 'FrontendController@course')->name('course');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('dashboard');

Route::post('/ajaxlogin', 'LoginController@ajaxlogin')->name('ajaxlogin');

Route::group(['middleware' => ['auth']], function () {
	Route::post('/uploadimage', 'ProfileController@uploadimage')->name('uploadimage');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/profile', 'ProfileController@update')->name('profile.update');

    Route::resource('newsletters', 'NewsletterController');
	Route::resource('subscribers', 'SubscriberController');
	Route::resource('orders', 'OrderController');

    Route::middleware('is_super_admin')->group(function (){
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
    });
    
    Route::resource('cerita-alumni', 'CeritaAlumniController');
    Route::resource('tutors', 'TutorController');
    Route::resource('banners', 'BannerController');
    Route::resource('subclasses.chats', 'ChatController');
    Route::resource('classes.subclasses', 'SubclassController');
    Route::get('/class/subclass/photo/{subclass}', 'SubclassController@photo')->name(
            'classes.subclasses.photo'
        );
    Route::get('/class/subclass/chat/{subclass}', 'SubclassController@chat')->name(
            'classes.subclasses.chat'
        );
    Route::resource('testimonial', 'TestimonialController');
        
    Route::resource('blogs', 'BlogController');
    Route::resource('classes', 'ClasController');
    Route::resource('advantages', 'AdvantageController');
    Route::resource('our-contact', 'OurContactController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::resource('subclasses.photos', 'PhotoController');
    Route::prefix('newsletters')->name('newsletters.')->group(function (){
        Route::post('publish/{newsletter}', 'NewsletterController@publish')->name(
            'publish'
        );
        Route::get('unsubscribe/{email}', 'NewsletterController@unsubscribe')->name(
            'unsubscribe'
        );
    });
});