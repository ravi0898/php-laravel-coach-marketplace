<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/contact', 'WebsiteController@contact')->name('contact');
Route::post('/contact-send', 'WebsiteController@contact_send')->name('contact-send');
Route::get('/policy', 'WebsiteController@policy')->name('policy');
Route::get('/terms', 'WebsiteController@terms')->name('terms');
Route::get('/about-us', 'WebsiteController@about')->name('about');
Route::get('/', 'WebsiteController@index');
Route::get('/coach/detail/{id}', 'WebsiteController@coach_detail')->name('coach-detail');
Route::get('/user/register', 'WebsiteController@user_register')->name('user-register');
Route::get('/discover-advisors', 'WebsiteController@discover')->name('discover');

Route::post('/search-coach', 'WebsiteController@search_coach')->name('search-coach');


Route::post('/search/discover-advisors', 'WebsiteController@search_discover')->name('search-discover');
Route::get('/become-an-advisor', 'WebsiteController@become_an_advisor')->name('become-an-advisor');
Route::get('/for-business', 'WebsiteController@for_business')->name('for-business');

Route::post('/contactInq', 'WebsiteController@contactInquiry')->name('contactInq');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth'])->group(function () {
 
    Route::get('/meeting-have-time', 'AdminController@meeting_have_time')->name('meeting-have-time');
    Route::get('/callbackurl/{id}', 'AdminController@callback')->name('callbackurl');
    
    Route::get('/expire-link/{id}', 'AdminController@expire_link')->name('expire-link');
    Route::post('/user/extend-meeting', 'StripePaymentController@extend_meeting')->name('user-extend-meeting');
    Route::post('stripe-extend', 'StripePaymentController@extend_meeting_done')->name('stripe_extend.post');
    Route::get('/change-notification-status/{id}', 'HomeController@change_notification_status')->name('change-notification-status');
    
    
});

//admin routes starts
    Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', 'AdminController@index')->name('admin-dashboard');

    Route::get('/admin/master-category', 'AdminController@masterCategory')->name('admin-master-category');


    Route::get('/admin-mcategory-edit/{id}', 'AdminController@masterCatedit')->name('admin-mcategory-edit');


    Route::post('/update-master-cat', 'AdminController@updmasterCat')->name('update-master-cat');

    Route::post('/admin/add-master-cat', 'AdminController@addmasterCat')->name('add-master-cat');

    Route::get('/admin-mcategory-delete/{id}', 'AdminController@destroy_category_master')->name('admin-mcategory-delete');

    Route::get('/admin/master-category-data', 'AdminController@master_categorydata')->name('admin/master-catData');

    Route::get('/admin-catdata-edit/{id}', 'AdminController@edit_catdata')->name('admin-catdata-edit');

    
    Route::post('/updmaster-categorydata', 'AdminController@updCategoryData')->name('updmaster-categorydata');
    
    Route::post('/admin/addmaster-categorydata', 'AdminController@addCategoryData')->name('addmaster-categorydata');

    Route::get('/admin-catdata-delete/{id}', 'AdminController@destroy_catdata_master')->name('admin-catdata-delete');


    Route::get('/admin-coach-category', 'AdminController@category_coach')->name('admin-coach-category');

    Route::get('/admin-addCoach-category', 'AdminController@coachCatshow')->name('admin-addCoach-category');

    Route::post('/admin-insert-coachCat', 'AdminController@AddCategoryOfcoach')->name('admin-insert-coachCat');

    Route::get('/admin-coachCategory-delete/{id}', 'AdminController@destroy_coachCategory')->name('admin-coachCategory-delete');


    Route::get('/admin-coachCategory-edit/{id}', 'AdminController@edit_coachCategory')->name('admin-coachCategory-edit');

    Route::post('/admin-update-coachCat', 'AdminController@updCategoryOfcoach')->name('admin-update-coachCat');



    Route::get('/admin/users', 'AdminController@user_list')->name('admin-users');
    Route::get('/admin-user-view/{id}', 'AdminController@view_user')->name('admin-user-view');
    Route::get('/admin/delete-user/{id}', 'AdminController@destroy_user')->name('admin-user-delete');

    Route::get('/admin-coach-list', 'AdminController@coach_list')->name('admin-coach-list');
    
    Route::get('/admin/delete-coach/{id}', 'AdminController@destroy_coach')->name('admin-coach-delete');

    Route::get('/admin-coach-edit/{id}', 'AdminController@edit_coach')->name('admin-coach-edit');
    
    Route::get('/admin-coach-view/{id}', 'AdminController@view_coach')->name('admin-coach-view');
    

    Route::get('/admin-coach-active/{id}', 'AdminController@activeCoachProfile')->name('admin-coach-active');

    Route::get('/admin-coach-approval/{id}{status}', 'AdminController@statusCoachProfile')->name('admin-coach-approval');
    

    Route::post('/admin/coach-profile-update', 'AdminController@update_coach_profile')->name('admin-coach-profile-update');

    Route::get('/admin-coach-add', 'AdminController@coach_add')->name('admin-coach-add');

    Route::post('/coach-profile-add', 'AdminController@add_coach_profile')->name('coach-profile-add');

    Route::get('/admin/profile', 'AdminController@profile')->name('admin-profile');
    
    Route::post('/admin/update-profile', 'AdminController@update_profile')->name('admin-update-profile');
    
    Route::get('/admin-slider-select/{id}{status}','AdminController@sliderSelect')->name('admin-slider-select');
    
    //FAQ ROUTE
    Route::get('/admin-faq','AdminController@FaqShow')->name('admin-faq');
    Route::get('/admin-addFaq','AdminController@FaqAdd')->name('admin-addFaq');
    Route::post('/admin-insert-faq', 'AdminController@inserFaq')->name('admin-insert-faq');
    Route::get('/admin-faq-delete/{id}', 'AdminController@destroy_faq')->name('admin-faq-delete');
    Route::get('/admin-faq-edit/{id}', 'AdminController@edit_Faq')->name('admin-faq-edit');
    Route::post('/admin-update-faq', 'AdminController@updateFaq')->name('admin-update-faq');
    //FAQ ROUTE
    
    
    //bookings
    
    Route::get('/admin-show-booking','AdminController@ShowBooking')->name('admin-show-booking');

    Route::get('/admin-booking-view/{id}', 'AdminController@booking_view')->name('admin-booking-view');

    
    Route::get('/admin-transaction','AdminController@showTransaction')->name('admin-transaction');
    Route::get('/admin-transactionView/{id}', 'AdminController@transaction_view')->name('admin-transactionView');
    Route::post('/admin-req-approval', 'AdminController@payment_approval')->name('admin-req-approval');



    Route::get('/admin-invoice/{id}', 'AdminController@invoice_view')->name('admin-invoice');

    // Route::get('/admin-createmeet', 'AdminController@create_meeting')->name('admin-createmeet');

    // Route::get('/admin-callbackurl/{id}', 'AdminController@callback')->name('admin-callbackurl');

    // Route::get('/admin-rating', 'AdminController@ratingReview')->name('admin-rating');
    

    
    Route::get('/admin-pay', 'AdminController@payStripe')->name('admin-pay');

    Route::get('/admin/change-notification-status/{id}', 'HomeController@change_notification_status_admin')->name('change-notification-status-admin');
});

//admin routes end

Route::middleware(['auth','coachauth'])->group(function () {
    Route::get('/coach/dashboard', 'CoachController@index')->name('coach-dashboard');
    Route::get('/coach/profile', 'CoachController@profile')->name('coach-profile');
    Route::post('/coach/update-profile', 'CoachController@update_profile')->name('coach-update-profile');

    Route::get('/coach/payment-info', 'CoachController@payment_info')->name('coach-payment-info');
    Route::post('/coach/update-payment-info', 'CoachController@update_payment_info')->name('coach-update-payment-info');

    Route::get('/coach/calender', 'CoachController@calender')->name('coach-calender');
    Route::get('/coach/calender-confirm', 'CoachController@coach_calender_confirm')->name('coach-calender-confirm');
    Route::post('/coach/update-calender-tempory', 'CoachController@update_calender_tempory')->name('coach-update-calender-tempory');
    Route::post('/coach/update-calender', 'CoachController@update_calender')->name('coach-update-calender');
    
    Route::get('/coach/booking', 'CoachController@booking')->name('coach-booking');
    
    Route::get('/coach/transaction', 'CoachController@transaction')->name('coach-transaction');
    
    Route::get('/coach/faq', 'CoachController@faq')->name('coach-faq');
    
    Route::get('/coach/booking-view/{id}', 'CoachController@booking_view')->name('coach-booking-view');
   
    Route::post('/coach/booking-rejection', 'CoachController@coach_booking_rejection')->name('coach-booking-rejection');
    Route::post('/coach/confirmed-availability', 'CoachController@coach_confirmed_availability')->name('coach-confirmed-availability');
    
    
    Route::get('/coach-transactionView/{id}', 'CoachController@transaction_view')->name('coach-transactionView');
    
    Route::get('/coach-payment-request/{id}','CoachController@sendRequestpay')->name('coach-payment-request');
    
    Route::get('/coach-payment-donet/{id}','CoachController@donetpay')->name('coach-payment-donet');
    
    Route::get('/coach-invoice/{id}', 'CoachController@invoice_view')->name('coach-invoice');


    
});

Route::middleware(['auth','userauth'])->group(function () {
    Route::post('/user/register', 'UserController@register')->name('user-register');
    
    Route::get('/user/dashboard', 'UserController@index')->name('user-dashboard');
    Route::get('/user/profile', 'UserController@profile')->name('user-profile');
    Route::post('/user/update-profile', 'UserController@update_profile')->name('user-update-profile');

    Route::get('/user/booking', 'UserController@booking')->name('user-booking');
    Route::get('/user/booking-view/{id}', 'UserController@booking_view')->name('user-booking-view');
    
    Route::get('/user/transaction', 'UserController@transaction')->name('user-transaction');
    
    Route::get('/user/faq', 'UserController@faq')->name('user-faq');

    Route::get('/coach/coach-booking-confirm/{id}', 'UserController@coach_booking_confirm')->name('coach-booking-confirm');
    Route::post('/user/booking-confirm', 'UserController@booking_confirm')->name('booking-confirm');
    
    Route::post('/user/slot-booking', 'UserController@user_slot_booking')->name('user-slot-booking');
    Route::post('/user/booking-scheduled', 'UserController@user_booking_scheduled')->name('user-booking-scheduled');
    
    Route::get('stripe/{id}', 'StripePaymentController@stripe')->name('stripe-pay');
    Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
    
    Route::post('/user-addReview', 'UserController@doReview')->name('user-addReview');
    
    Route::get('/user-transactionView/{id}', 'UserController@view_transaction')->name('user-transactionView');

    Route::get('/user-invoice/{id}', 'UserController@invoice_view')->name('user-invoice');

    
});