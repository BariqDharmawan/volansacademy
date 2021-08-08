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
Route::post('/ceksignup', 'LoginController@ceksignup')->name('ceksignup');

Route::group(['middleware' => ['auth']], function () {
	Route::post('/uploadimage', 'ProfileController@uploadimage')->name('uploadimage');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/profile', 'ProfileController@update')->name('profile.update');	
	Route::post('/cekkupon', 'ProfileController@cekkupon')->name('cekkupon');	
	Route::post('/updatetransactionid', 'ProfileController@updatetransactionid')->name('updatetransactionid');	
	Route::post('/buy', 'ProfileController@buy')->name('buy');	
	Route::post('/addToCart', 'FrontendController@addToCart')->name('addToCart');
	Route::post('/deleteFromCart', 'FrontendController@deleteFromCart')->name('deleteFromCart');
	Route::post('/updateCart', 'FrontendController@updateCart')->name('updateCart');
	Route::post('/useVoucher', 'FrontendController@useVoucher')->name('useVoucher');
	Route::post('/checkout', 'FrontendController@checkout')->name('checkout');
	Route::get('/konfirmasipembayaran/{order}', 'FrontendController@konfirmasipembayaran')->name('konfirmasipembayaran');
	
	Route::get('/cart', 'FrontendController@cart')->name('cart');	
	Route::post('/newsletterspublish/{newsletter}', 'NewsletterController@publish')->name('newsletterspublish');	
	Route::get('/newslettersunsubscribe/{email}', 'NewsletterController@unsubscribe')->name('newslettersunsubscribe');	
	Route::resource('roles', 'RoleController');
	Route::resource('testimonial', 'TestimonialController');
    Route::resource('users', 'UserController');
	Route::resource('blogs', 'BlogController');
	Route::resource('newsletters', 'NewsletterController');
	Route::resource('subscribers', 'SubscriberController');
	Route::resource('classes', 'ClasController');
	Route::resource('orders', 'OrderController');
	Route::resource('coupons', 'CouponController');
	Route::resource('classes.subclasses', 'SubclassController');
	Route::get('/class/subclass/photo/{subclass}', 'SubclassController@photo')->name('classes.subclasses.photo');	
	Route::get('/class/subclass/chat/{subclass}', 'SubclassController@chat')->name('classes.subclasses.chat');	
	Route::resource('subclasses.photos', 'PhotoController');
	Route::resource('subclasses.chats', 'ChatController');
	Route::resource('videos', 'VideoController');
	Route::resource('tutors', 'TutorController');
	Route::resource('banners', 'BannerController');
	Route::resource('advantages', 'AdvantageController');
	Route::resource('configurations', 'ConfigurationController');
});