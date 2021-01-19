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



// #################General Routes####################

// Route::get('general/contact',function(){
//     return view('admin.general.contact');
// })->name('admin.general.contact');

// Route::get('general/about',function(){
//    return view('admin.general.about');
// })->name('admin.general.about');
Route::get('general/about',[
    'uses' => 'AdminAboutController@index',
    'as' => 'admin.general.about'
 ]);

Route::post('general/about/store',[
     'uses' => 'AdminAboutController@store',
     'as' => 'admin.about.store'
     ]);

Route::get('general/faq',[
    'uses' => 'AdminFaqController@index',
    'as' => 'admin.general.faq'
     ]);
Route::post('general/faq/store',[
    'uses' => 'AdminFaqController@store',
    'as' => 'admin.faq.store'
         ]);

Route::get('general/blog',[
    'uses' => 'AdminBlogController@index',
    'as' => 'admin.general.blog'
        ]);

Route::get('general/blog/add',[
    'uses' => 'AdminBlogController@add',
    'as' => 'admin.blog.add'
        ]);

Route::post('general/blog/store',[
    'uses' => 'AdminBlogController@store',
    'as' => 'admin.blog.store'
        ]);


Route::get('general/blog/show/{id}',[
    'uses' => 'AdminBlogController@show',
    'as' => 'admin.blog.show'
        ]);

Route::get('general/blog/edit{id}',[
    'uses' => 'AdminBlogController@edit',
    'as' => 'admin.blog.edit'
        ]);

Route::post('general/blog/update',[
    'uses' => 'AdminBlogController@update',
    'as' => 'admin.blog.update'
        ]);

Route::get('general/blog/delete/{id}',[
    'uses' => 'AdminBlogController@delete',
    'as' => 'admin.blog.delete'
        ]);



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

/* Booking Follow Up Show */
Route::get('bookings/follow_up',[
    'uses' => 'AdminBookingFollowUpController@index',
    'as' => 'admin.booking.followup'
]);

Route::post('bookings/follow_up/store',[
    'uses' => 'AdminBookingFollowUpController@store',
    'as' => 'admin.booking.followup.store'
]);

Route::get('bookings/follow_up/show/{id}',[
    'uses' => 'AdminBookingFollowUpController@show',
    'as' => 'admin.booking.followup.show'
]);

// Booking Routes ###########################

Route::get('booking',[
    'uses'=>'AdminBookingController@index',
    'as'=>'admin.booking'
]);

Route::get('booking/show/{id}',[
    'uses'=>'AdminBookingController@show',
    'as'=>'admin.booking.show'
]);
Route::post('booking/accept',[
    'uses'=>'AdminBookingController@accept',
    'as'=>'admin.booking.accept'
]);

// PR Migartion #####################

Route::get('pr_Migration',[
    'uses'=>'AdminPrmigationController@index',
    'as'=>'admin.prmigration'
]);

Route::post('PR_Migration/store',[
    'uses'=>'AdminPrmigationController@store',
    'as'=>'admin.prmigration.store'
]);

/* Application Routes */
Route::get('application',[
    'uses'=>'AdminApplicationController@index',
    'as'=>'admin.application'
]);

Route::get('application/show/{id}',[
    'uses'=>'AdminApplicationController@applicationCreate',
    'as'=>'admin.application.create'
]);

Route::post('application/document/store',[
    'uses'=>'AdminApplicationController@documentStore',
    'as'=>'admin.application.document'
]);

Route::post('application/document/delete',[
    'uses' =>'AdminApplicationController@destroy',
    'as'=>'admin.application.document.destroy'
]);

Route::post('application/offer/decline',[
    'uses' => 'AdminApplicationController@offerDecline',
    'as'=>'admin.application.offer.decline'
]);


/* Application Apply */
Route::post('application/apply',[
    'uses' => 'AdminApplicationController@applicationApply',
    'as' => 'admin.application.apply'
]);

Route::post('application/approval',[
    'uses' => 'AdminApplicationController@applicationApprovel',
    'as' => 'admin.application.approval'
]);

Route::post('application/accepted',[
    'uses' => 'AdminApplicationController@applicationAccepted',
    'as' => 'admin.application.accepted'
]);

Route::post('application/readytofly',[
    'uses' => 'AdminApplicationController@applicationReady',
    'as' => 'admin.application.readytofly'
]);

Route::post('application/update/university',[
    'uses' =>'AdminApplicationController@universityUpdate',
    'as'=>'admin.application.update.university'
]);


/* Application Follow Up */
Route::get('applications/followup',[
    'uses' => 'AdminApplicationFollowUpController@index',
    'as' => 'admin.application.followup'
]);

Route::get('applications/followup/create',[
    'uses' => 'AdminApplicationFollowUpController@create',
    'as' => 'admin.application.followup.create'
]);

Route::post('applications/followup/store',[
    'uses' => 'AdminApplicationFollowUpController@store',
    'as' => 'admin.application.followup.store'
]);

Route::get('applications/followup/show/{id}',[
    'uses' => 'AdminApplicationFollowUpController@show',
    'as' => 'admin.application.followup.show'
]);


// Advertisement ################################

Route::get('advertisement',[
    'uses'=>'AdminAdvertisementController@index',
    'as'=>'admin.advertisement_manager'
]);
Route::post('advertisement/update',[
    'uses'=>'AdminAdvertisementController@update',
    'as'=>'advertisement_manager.update'
]);


/* Add User */
Route::get('users/user/add',[
    'uses'=>'AdminUsersController@add',
    'as'=>'admin.user.add'
]);
Route::post('users/user/store',[
    'uses'=>'AdminUsersController@store',
    'as'=>'admin.user.store'
]);

Route::get('export', 'AdminExcelController@export')->name('export');
Route::get('importExportView', 'AdminExcelController@importExportView');
Route::post('import', 'AdminExcelController@import')->name('adminImport');
 });

Route::get('/', function () {
    return view('frontEnd.index');
})->name('front');




