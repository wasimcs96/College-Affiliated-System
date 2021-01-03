<?php
// dd(Auth::check());
// Auth::routes();
// Route::middleware(['auth'])->group(function () {
 use Illuminate\Support\Facades\Route;
//use Illuminate\Routing\Route;

Route::group(['prefix'=>'admin', 'middleware' => 'role:superadmin'], function () {
 Route::get('dash', function(){

    return "admin";
});

Route::get('dashboard',function(){
    return view('admin.dashboard');
 })->name('admin.dashboard');

Route::get('mypage/index','MypageController@index')->name('mypage.index');


// ####################application#############
Route::get('application',function(){
    return view('admin.application.application');
})->name('admin.application');


//#############################Applicaiton show routes###############################################
// Route::get('application/university/show',function(){
//     return view('admin.application.university_show');
// })->name('admin.application.university_show');

Route::get('application/show',function(){
   return view('admin.application.application_show');
})->name('admin.application.application_show');

Route::get('application/application',function(){
   return view('admin.application.application_application');
})->name('admin.application.application_application');

Route::get('application/create',function(){
   return view('admin.application.application_create');
})->name('admin.application.application_create');

Route::get('booking/consultant',function(){
   return view('admin.booking.consultant');
})->name('admin.booking.consultant');


// #################General Routes####################

// Route::get('general/contact',function(){
//     return view('admin.general.contact');
// })->name('admin.general.contact');

Route::get('general/about',function(){
   return view('admin.general.about');
})->name('admin.general.about');

Route::get('general/terms&condition',function(){
   return view('admin.general.terms');
})->name('admin.general.terms');

Route::get('general/privacy_policy',function(){
   return view('admin.general.privacy_policy');
})->name('admin.general.privacy_policy');

// ###############Report Application########################

Route::get('report/application/client',function(){
   return view('admin.report.application.client');
})->name('admin.report.application.client');

Route::get('report/application/university',function(){
   return view('admin.report.application.university');
})->name('admin.report.application.university');

Route::get('report/application/consultant',function(){
   return view('admin.report.application.consultant');
})->name('admin.report.application.consultant');

Route::get('report/application/client_show',function(){
   return view('admin.report.application.client_show');
})->name('admin.report.application.client_show');

Route::get('report/application/university_show',function(){
   return view('admin.report.application.university_show');
})->name('admin.report.application.university_show');

Route::get('report/application/consultant_show',function(){
   return view('admin.report.application.consultant_show');
})->name('admin.report.application.consultant_show');

Route::get('report/application/client_application',function(){
   return view('admin.report.application.client_application');
})->name('admin.report.application.client_application');

Route::get('report/application/university_application',function(){
   return view('admin.report.application.university_application');
})->name('admin.report.application.university_application');

Route::get('report/application/consultant_application',function(){
   return view('admin.report.application.consultant_application');
})->name('admin.report.application.consultant_application');
// ############################# Report BooKing#################
Route::get('report/booking/client',function(){
   return view('admin.report.booking.client');
})->name('admin.report.booking.client');

Route::get('report/booking/consultant',function(){
   return view('admin.report.booking.consultant');
})->name('admin.report.booking.consultant');


Route::get('report/booking/client_show',function(){
   return view('admin.report.booking.client_show');
})->name('admin.report.booking.client_show');

Route::get('report/booking/consultant_show',function(){
   return view('admin.report.booking.consultant_show');
})->name('admin.report.booking.consultant_show');


Route::get('report/booking/client_application',function(){
   return view('admin.report.booking.client_application');
})->name('admin.report.booking.client_application');

Route::get('report/booking/consultant_application',function(){
   return view('admin.report.booking.consultant_application');
})->name('admin.report.booking.consultant_application');

// #################Earning###############
// Route::get('earning',function(){
//     return view('admin.earning.earning');
// })->name('admin.earning');

Route::get('earning',[
    'uses' => 'AdminEarningController@index',
     'as' => 'admin.earning'
]);

Route::get('earning/show/{id}',[
    'uses' => 'AdminEarningController@show',
     'as' => 'admin.earning.earning_show'
]);
// Route::get('earning/earning_show',function(){
//    return view('admin.earning.earning_show');
// })->name('admin.earning.earning_show');
// ######################profile##############

/* Profile Section */
Route::get('profile',[
    'uses' => 'AdminProfileController@profile',
    'as' => 'admin.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'AdminProfileController@profileStore',
     'as' => 'admin.profile.update'
 ]);


 /* Packages */

 Route::get('packages',[
    'uses' => 'AdminPackagesController@index',
    'as' => 'admin.packages'
]);

 Route::get('packages/create',[
    'uses' => 'AdminPackagesController@create',
    'as' => 'admin.packages.create'
]);

Route::get('packages/show/{id}',[
    'uses' => 'AdminPackagesController@show',
    'as' => 'admin.packages.show'
]);

Route::get('packages/add',[
    'uses' => 'AdminPackagesController@add',
    'as' => 'admin.packages.add'
]);



Route::post('packages/store',[
    'uses' => 'AdminPackagesController@store',
    'as' => 'admin.packages.store'
]);


Route::get('packages/edit/{id}',[
    'uses' => 'AdminPackagesController@edit',
    'as' => 'admin.packages.edit'
]);

Route::post('packages/update/{id}',[
    'uses' => 'AdminPackagesController@update',
    'as' => 'admin.packages.update'
]);

Route::get('packages/delete/{id}', [
    'uses' => 'AdminPackagesController@destroy',
    'as' => 'admin.packages.delete'
]);

/* Subscription */
Route::get('subscription', [
    'uses' => 'AdminSubscriptionController@index',
    'as' => 'admin.subscription'
]);

/* Category  */

Route::get('category', [
    'uses' => 'AdminCategoryController@index',
    'as' => 'admin.category'
]);

Route::get('category/add',[
    'uses' => 'AdminCategoryController@create',
    'as' => 'admin.category.add'
]);

Route::get('category/show/{id}',[
    'uses' => 'AdminCategoryController@show',
    'as' => 'admin.category.show'
]);

Route::post('category/store',[
    'uses' => 'AdminCategoryController@store',
    'as' => 'admin.category.store'
]);

Route::get('category/edit/{id}',[
    'uses' => 'AdminCategoryController@edit',
    'as' => 'admin.category.edit'
]);

Route::post('category/update/{id}',[
    'uses' => 'AdminCategoryController@update',
    'as' => 'admin.category.update'
]);

Route::get('category/delete/{id}', [
    'uses' => 'AdminCategoryController@destroy',
    'as' => 'admin.category.delete'
]);

/* Courses  */

Route::get('courses', [
   'uses' => 'AdminCoursesController@index',
   'as' => 'admin.courses'
]);

Route::get('courses/add',[
   'uses' => 'AdminCoursesController@create',
   'as' => 'admin.courses.add'
]);

Route::get('course/show/{id}',[
   'uses' => 'AdminCoursesController@show',
   'as' => 'admin.courses.show'
]);

Route::post('course/store',[
   'uses' => 'AdminCoursesController@store',
   'as' => 'admin.courses.store'
]);

Route::get('course/edit/{id}',[
   'uses' => 'AdminCoursesController@edit',
   'as' => 'admin.courses.edit'
]);

Route::post('course/update/{id}',[
   'uses' => 'AdminCoursesController@update',
   'as' => 'admin.courses.update'
]);

Route::get('course/delete/{id}', [
   'uses' => 'AdminCoursesController@destroy',
   'as' => 'admin.courses.delete'
]);


/* Users Client Section */
Route::get('users/{id}',[
    'uses' => 'AdminUsersController@index',
    'as' => 'admin.users'
]);

// Route::get('users/client',[
//     'uses' => 'AdminUsersController@indexClient',
//     'as' => 'admin.user'
// ]);

Route::get('users/show/{id}',[
    'uses' => 'AdminUsersController@show',
    'as' => 'admin.user.show'
]);

Route::get('users/edit/{id}',[
    'uses' => 'AdminUsersController@edit',
    'as' => 'admin.user.edit'
]);

Route::post('users/update/{id}',[
    'uses' => 'AdminUsersController@update',
    'as' => 'admin.user.update'
]);

Route::get('users/delete/{id}',[
    'uses' => 'AdminUsersController@destroy',
    'as' => 'admin.user.delete'
]);



});

Route::get('/', function () {
    return view('frontEnd.index');
})->name('front');

// Booking Routes ###########################

Route::get('booking',[
    'uses'=>'AdminBookingController@index',
    'as'=>'admin.booking'
]);

Route::get('booking/{id}',[
    'uses'=>'AdminBookingController@show',
    'as'=>'admin.booking_show'
]);
Route::post('booking/accept',[
    'uses'=>'AdminBookingController@accept',
    'as'=>'admin.booking.accept'
]);

// PR Migartion #####################

Route::get('PR_Migration',[
    'uses'=>'AdminPrmigationController@index',
    'as'=>'admin.prmigration'
]);

Route::post('PR_Migration/store',[
    'uses'=>'AdminPrmigationController@store',
    'as'=>'admin.prmigration.store'
]);
