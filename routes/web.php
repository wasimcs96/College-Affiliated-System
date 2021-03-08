<?php

// Route::get('/', function () {
//     return view('welcome');
// })->name('front');

// Route::get('/', function () {
//         return view('frontEnd.index');
//     })->name('front');


    // Route::get('/',[
    //     'uses'=>'FrontEndController\FrontEndController@index',
    //     'as'=>'front'
    // ]);

// ######################univerisity all###################################
Route::get('university/all',[
    'uses'=>'FrontEndController\UniversityFrontController@index',
    'as'=>'university_all'
]);

Route::get('university/detail/{id}',[
    'uses' => 'FrontEndController\UniversityFrontController@detail',
    'as' => 'university_detail'
]);

Route::get('course/fetch/universitys',[
    'uses' => 'FrontEndController\UniversityFilterController@filter',
    'as' => 'university_fetch'
]);


Route::post('fetch/course/university/coursewise',[
    'uses' => 'FrontEndController\UniversityFilterController@courseWiseUniversity',
    'as' => 'university_fetch.coursewise'
]);


Route::post('fetch/university/countrywise',[
    'uses' => 'FrontEndController\UniversityFilterController@countryWiseUniversity',
    'as' => 'university_fetch.countrywise'
]);


Route::post('fetch/university/selectedcountrywise',[
    'uses' => 'FrontEndController\UniversityFilterController@countrySelected',
    'as' => 'university_fetch_selected.countrywise'
]);

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::post('fetch/consultants/universitywise',[
    'uses' => 'FrontEndController\UniversityFilterController@universityWiseConsultant',
    'as' => 'consultant_fetch_selected.universitywise'
]);

Route::post('fetch/universities/innerfilter',[
    'uses' => 'FrontEndController\UniversityFilterController@universitiesInnerFilter',
    'as' => 'universities_inner_fetch.universities'
]);

Route::post('university/consultant',[
    'uses' => 'FrontEndController\UniversityFrontController@consultant',
    'as' => 'university_consultant'
]);

Route::post('payment/subscription','PaymentController@payment')->name('subscription.payment');
Route::get('payment/transaction','PaymentController@transaction')->name('transaction.pay');
// ################university all######################################
// Route::get('details', function () {

// 	$ip = '122.176.16.3';
//     $data = \Location::get($ip);
//     dd($data);

// });
/* frontend routes */
/* Courses route */

Route::get('course_all', function(){
    return view('frontEnd.courses.course_all');
})->name('course_all');

Route::get('course_detail', function(){
    return view('frontEnd.courses.course_detail');
})->name('course_detail');

Route::get('course/detail/{id}',[
    'uses' => 'FrontEndController\CourseFrontController@detail',
    'as' => 'course_detail'
]);

/* consultants route */

// Route::get('consultant_all',function (){
//     return view('frontEnd.consultant.consultant_all');
// })->name('consultant_all');

Route::get('consultant/all',[
    'uses' => 'FrontEndController\ConsultantFrontController@index_all',
    'as' => 'consultant_all'
]);

Route::get('consultant/detail/{id}',[
    'uses' => 'FrontEndController\ConsultantFrontController@index_single',
    'as' => 'consultant_detail'
]);

Route::post('consultant/book/{id}',[
    'uses' => 'FrontEndController\ConsultantFrontController@book',
    'as' => 'consultant_book'
]);

Route::post('client/consultant/booking/confirm',[
    'uses' => 'FrontEndController\ConsultantFrontController@book_store',
    'as' => 'consultant.book.store'
]);

Route::get('/fetch/course',[
    'uses' => 'FrontEndController\ConsultantFrontController@fetch_course',
    'as' => 'fetch.course'
]);

Route::post('/slots',[
    'uses' => 'FrontEndController\ConsultantFrontController@slots',
    'as' => 'slots.avail'
]);
/* university route */

// Route::get('university_detail', function(){
//     return view('frontEnd.university.university_detail');
// })->name('university_detail');

// Route::get('university_all', function(){
//     return view('frontEnd.university.university_all');
// })->name('university_all');

/* blog routes*/
// Route::get('blog_all',function(){
//     return view('frontEnd.blog.blog_all');
// })->name('blog_all');

Route::get('blog_all',[
    'uses' => 'FrontEndController\BlogFrontController@index',
    'as'=> 'blog_all'
]);


Route::get('blog_detail/{id}',[
    'uses' => 'FrontEndController\BlogFrontController@detail',
    'as'=> 'blog_detail'
]);

// })->name('blog_detail');


// about and contact
Route::get('about', function(){
    return view('frontEnd.about.about');
})->name('about');

Route::get('privacy&policy/campus', function(){
    return view('frontEnd.privacy&policy.p&p');
})->name('privacy&policy');

Route::get('terms&condition/campus', function(){
    return view('frontEnd.terms_co.t&c');
})->name('terms&condition');

// Route::get('contact', function(){
//     return view('frontEnd.contact.contact');
// })->name('contact');

Route::get('contact',[
    'uses' => 'FrontEndController\ContactFrontController@index',
    'as' => 'contact'
]);

Route::post('contact/store',[
    'uses' => 'FrontEndController\ContactFrontController@store',
    'as' => 'front.contact.store'
]);

/* frontend routes end */

Route::group([
    'namespace' => 'Auth',
], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('register/activate/{token}', 'RegisterController@confirm')->name('email_confirm');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

Route::get('home', 'UserController@index')->name('home');



Route::get('index', function(){
    return view('frontEnd.index');
})->name('frontend.index');

// Route::get('index',[
//     'uses'=>'FrontEndController\FrontEndController@index',
//     'as'=>'frontend.index'
// ]);

Route::get('recoverpassword',function(){
    return view('frontEnd.recover');
})->name('frontEnd.recover');
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

Route::get('/', function () { return redirect('index'); });



/* Frontend */
Route::get('/frontend', function(){
    return view('frontEnd.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Consultant*/

/* Messenger  */

Route::get('messenger', [
    'uses' => 'MessengerController@index',
    'as' => 'messanger'
]);

Route::post('messenger/fetchData', [
    'uses' => 'MessengerController@fetchData',
    'as' => 'messanger.fetchdata'
]);

Route::post('messenger/sendMessage', [
    'uses' => 'MessengerController@sendMessage',
    'as' => 'messanger.sendmessage'
]);

Route::get('prmigration', [
    'uses' => 'FrontEndController\PrMigrationFrontController@index',
    'as' => 'Prmigration'
]);

Route::post('prmigration/searchresult',[
    'uses'=> 'FrontEndController\PrMigrationFrontController@search',
    'as' => 'prmigration.search.result'
]);

Route::get('prmigration/book/{id}', [
    'uses' => 'FrontEndController\PrMigrationFrontController@book',
    'as' => 'prmigration.book'
]);

Route::post('prmigration/slots',[
    'uses' => 'FrontEndController\PrMigrationFrontController@slots',
    'as' => 'prmigration.slots.avail'
]);

Route::post('prmigration/consultant/booking/confirm',[
    'uses' => 'FrontEndController\PrmigrationFrontController@book_store',
    'as' => 'prmigration.book.store'
]);

Route::get('frequently/asked/question',[
    'uses'=>'FrontEndController\faqFrontController@index',
    'as'=>'faq.front'
]);
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');

Route::post('consultant/inner/filter',[
    'uses'=>'FrontEndController\UniversityFilterController@consultantsInnerFilter',
    'as'=>'consultant.inner.filter'
]);

Route::post('advertisement/click/count',[
    'uses'=>'FrontEndController\AdvertisementFrontController@advertisementCount',
    'as'=>'front.advertisement.click.count'
]);

Route::get('loan/detail', [
    'uses' => 'FrontEndController\LoanFrontController@index',
    'as' => 'loan'
]);

Route::post('loan/enquiry/submit', [
    'uses' => 'FrontEndController\LoanFrontController@loanEnquiry',
    'as' => 'loan.enquiry.submit'
]);

Route::post('consultant/modal/university', [
    'uses' => 'FrontEndController\ConsultantFrontController@addUniversity',
    'as' => 'consultant.modal.university'
]);

Route::post('consultant/modal/university/skip', [
    'uses' => 'FrontEndController\ConsultantFrontController@skipUniversity',
    'as' => 'consultant.university.skip'
]);

Route::post('login/check', [
    'uses' => 'FrontEndController\FrontEndController@loginCheck',
    'as' => 'login.check'
]);

Route::get('admin/cache/clear', function () {
    \Artisan::call('cache:clear');
    // dd('hurray');
});

Route::get('admin/config/clear', function () {
    \Artisan::call('config:clear');
});


// Route::get('crop/image',function (){
//     return view('image_cropping.cropping');
// })->name('image/crop');