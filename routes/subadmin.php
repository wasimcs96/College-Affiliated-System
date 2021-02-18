<?php
// dd(Auth::check());
// Auth::routes();
// Route::middleware(['auth'])->group(function () {
 use Illuminate\Support\Facades\Route;
//use Illuminate\Routing\Route;

Route::group(['middleware' => 'role:subadmin','middleware' => 'Status'], function () {
 Route::get('dash', function(){

    return "subadmin";
});

// Route::get('dashboard',function(){
//     return view('subadmin.dashboard');
//  })->name('subadmin.dashboard');

Route::get('dashboard',[
    'uses' => 'subadminDashBoardController@index',
    'as' => 'subadmin.dashboard'
 ]);

Route::get('mypage/index','MypageController@index')->name('mypage.index');



// #################General Routes####################

// Route::get('general/contact',function(){
//     return view('subadmin.general.contact');
// })->name('subadmin.general.contact');

// Route::get('general/about',function(){
//    return view('subadmin.general.about');
// })->name('subadmin.general.about');
Route::get('general/about',[
    'uses' => 'SubAdminAboutController@index',
    'as' => 'subadmin.general.about'
 ]);

Route::post('general/about/store',[
     'uses' => 'SubAdminAboutController@store',
     'as' => 'subadmin.about.store'
     ]);


     //  faqqqqq

     Route::get('general/faq/list',[
        'uses' => 'SubAdminFaqController@list',
        'as' => 'subadmin.general.faq_all'
         ]);
Route::get('general/faq',[
    'uses' => 'SubAdminFaqController@index',
    'as' => 'subadmin.general.faq'
     ]);

Route::get('general/faq/edit/{id}',[
        'uses' => 'SubAdminFaqController@edit',
        'as' => 'subadmin.general.faq.edit'
         ]);
Route::post('general/faq/store',[
    'uses' => 'SubAdminFaqController@store',
    'as' => 'subadmin.faq.store'
         ]);
Route::post('general/faq/update/{id}',[
            'uses' => 'SubAdminFaqController@update',
            'as' => 'subadmin.faq.update'
                 ]);
        
Route::get('general/faq/delete/{id}',[
'uses' => 'SubAdminFaqController@delete',
'as' => 'subadmin.general.faq.delete'
        ]);


        //  faqqqqq
Route::get('general/blog',[
    'uses' => 'SubAdminBlogController@index',
    'as' => 'subadmin.general.blog'
        ]);

Route::get('general/blog/add',[
    'uses' => 'SubAdminBlogController@add',
    'as' => 'subadmin.blog.add'
        ]);

Route::post('general/blog/store',[
    'uses' => 'SubAdminBlogController@store',
    'as' => 'subadmin.blog.store'
        ]);


Route::get('general/blog/show/{id}',[
    'uses' => 'SubAdminBlogController@show',
    'as' => 'subadmin.blog.show'
        ]);

Route::get('general/blog/edit{id}',[
    'uses' => 'SubAdminBlogController@edit',
    'as' => 'subadmin.blog.edit'
        ]);

Route::post('general/blog/update',[
    'uses' => 'SubAdminBlogController@update',
    'as' => 'subadmin.blog.update'
        ]);

Route::get('general/blog/delete/{id}',[
    'uses' => 'SubAdminBlogController@delete',
    'as' => 'subadmin.blog.delete'
        ]);


// ###########################CONTACT


Route::get('general/contact/all',[
    'uses' => 'SubAdminContactController@index',
    'as' => 'subadmin.contact.index'
        ]);

Route::get('general/contact/delete/{id}',[
    'uses' => 'SubAdminContactController@delete',
    'as' => 'subadmin.contact.delete'
        ]);

Route::get('general/contact/reply/{id}',[
    'uses' => 'SubAdminContactController@reply',
    'as' => 'subadmin.contact.reply'
        ]);

Route::get('general/contact/show/{id}',[
    'uses' => 'SubAdminContactController@show',
    'as' => 'subadmin.contact.show'
        ]);

// Route::get('general/terms&condition',function(){
//    return view('subadmin.general.terms');
// })->name('subadmin.general.terms');

Route::get('general/terms&condition',[
    'uses' => 'SubAdminTermsController@index',
    'as' => 'subadmin.general.terms'
 ]);

 Route::post('general/terms/store',[
    'uses' => 'SubAdminTermsController@store',
    'as' => 'subadmin.terms.store'
    ]);

Route::get('general/privacy_policy',[
    'uses' => 'SubAdminPrivacyController@index',
    'as' => 'subadmin.general.privacy'
 ]);

 Route::post('general/privacy_policy/store',[
    'uses' => 'SubAdminPrivacyController@store',
    'as' => 'subadmin.privacy.store'
    ]);


// ###############Report Application########################

Route::get('report/application/client',function(){
   return view('SubAdmin.report.application.client');
})->name('subadmin.report.application.client');

Route::get('report/application/university',function(){
   return view('SubAdmin.report.application.university');
})->name('subadmin.report.application.university');

Route::get('report/application/consultant',function(){
   return view('SubAdmin.report.application.consultant');
})->name('subadmin.report.application.consultant');

Route::get('report/application/client_show',function(){
   return view('SubAdmin.report.application.client_show');
})->name('subadmin.report.application.client_show');

Route::get('report/application/university_show',function(){
   return view('SubAdmin.report.application.university_show');
})->name('subadmin.report.application.university_show');

Route::get('report/application/consultant_show',function(){
   return view('SubAdmin.report.application.consultant_show');
})->name('subadmin.report.application.consultant_show');

Route::get('report/application/client_application',function(){
   return view('SubAdmin.report.application.client_application');
})->name('subadmin.report.application.client_application');

Route::get('report/application/university_application',function(){
   return view('SubAdmin.report.application.university_application');
})->name('subadmin.report.application.university_application');

Route::get('report/application/consultant_application',function(){
   return view('SubAdmin.report.application.consultant_application');
})->name('subadmin.report.application.consultant_application');
// ############################# Report BooKing#################
Route::get('report/booking/client',function(){
   return view('SubAdmin.report.booking.client');
})->name('subadmin.report.booking.client');

Route::get('report/booking/consultant',function(){
   return view('SubAdmin.report.booking.consultant');
})->name('subadmin.report.booking.consultant');


Route::get('report/booking/client_show',function(){
   return view('SubAdmin.report.booking.client_show');
})->name('subadmin.report.booking.client_show');

Route::get('report/booking/consultant_show',function(){
   return view('SubAdmin.report.booking.consultant_show');
})->name('subadmin.report.booking.consultant_show');


Route::get('report/booking/client_application',function(){
   return view('SubAdmin.report.booking.client_application');
})->name('subadmin.report.booking.client_application');

Route::get('report/booking/consultant_application',function(){
   return view('SubAdmin.report.booking.consultant_application');
})->name('subadmin.report.booking.consultant_application');

// #################Earning###############
// Route::get('earning',function(){
//     return view('subadmin.earning.earning');
// })->name('subadmin.earning');

Route::get('earning',[
    'uses' => 'SubAdminEarningController@index',
     'as' => 'subadmin.earning'
]);

Route::get('earning/show/{id}',[
    'uses' => 'SubAdminEarningController@show',
     'as' => 'subadmin.earning.earning_show'
]);
// Route::get('earning/earning_show',function(){
//    return view('subadmin.earning.earning_show');
// })->name('subadmin.earning.earning_show');
// ######################profile##############

/* Profile Section */
Route::get('profile',[
    'uses' => 'SubAdminProfileController@profile',
    'as' => 'subadmin.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'SubAdminProfileController@profileStore',
     'as' => 'subadmin.profile.update'
 ]);


 /* Packages */

 Route::get('packages',[
    'uses' => 'SubAdminPackagesController@index',
    'as' => 'subadmin.packages'
]);

 Route::get('packages/create',[
    'uses' => 'SubAdminPackagesController@create',
    'as' => 'subadmin.packages.create'
]);

Route::get('packages/show/{id}',[
    'uses' => 'SubAdminPackagesController@show',
    'as' => 'subadmin.packages.show'
]);

Route::get('packages/add',[
    'uses' => 'SubAdminPackagesController@add',
    'as' => 'subadmin.packages.add'
]);



Route::post('packages/store',[
    'uses' => 'SubAdminPackagesController@store',
    'as' => 'subadmin.packages.store'
]);


Route::get('packages/edit/{id}',[
    'uses' => 'SubAdminPackagesController@edit',
    'as' => 'subadmin.packages.edit'
]);

Route::post('packages/update/{id}',[
    'uses' => 'SubAdminPackagesController@update',
    'as' => 'subadmin.packages.update'
]);

Route::get('packages/delete/{id}', [
    'uses' => 'SubAdminPackagesController@destroy',
    'as' => 'subadmin.packages.delete'
]);

/* Subscription */
Route::get('subscription', [
    'uses' => 'SubAdminSubscriptionController@index',
    'as' => 'subadmin.subscription'
]);

/* Category  */

Route::get('category', [
    'uses' => 'SubAdminCategoryController@index',
    'as' => 'subadmin.category'
]);

Route::get('category/add',[
    'uses' => 'SubAdminCategoryController@create',
    'as' => 'subadmin.category.add'
]);

Route::get('category/show/{id}',[
    'uses' => 'SubAdminCategoryController@show',
    'as' => 'subadmin.category.show'
]);

Route::post('category/store',[
    'uses' => 'SubAdminCategoryController@store',
    'as' => 'subadmin.category.store'
]);

Route::get('category/edit/{id}',[
    'uses' => 'SubAdminCategoryController@edit',
    'as' => 'subadmin.category.edit'
]);

Route::post('category/update/{id}',[
    'uses' => 'SubAdminCategoryController@update',
    'as' => 'subadmin.category.update'
]);

Route::get('category/delete/{id}', [
    'uses' => 'SubAdminCategoryController@destroy',
    'as' => 'subadmin.category.delete'
]);

/* Courses  */

// Route::get('courses', [
//    'uses' => 'SubAdminCoursesController@index',
//    'as' => 'subadmin.courses'
// ]);

// Route::get('courses/add',[
//    'uses' => 'SubAdminCoursesController@create',
//    'as' => 'subadmin.courses.add'
// ]);

// Route::get('courses/show/{id}',[
//    'uses' => 'SubAdminCoursesController@show',
//    'as' => 'subadmin.courses.show'
// ]);

// Route::post('courses/store',[
//    'uses' => 'SubAdminCoursesController@store',
//    'as' => 'subadmin.courses.store'
// ]);

// Route::get('courses/edit/{id}',[
//    'uses' => 'SubAdminCoursesController@edit',
//    'as' => 'subadmin.courses.edit'
// ]);

// Route::post('courses/update/{id}',[
//    'uses' => 'SubAdminCoursesController@update',
//    'as' => 'subadmin.courses.update'
// ]);

// Route::get('courses/delete/{id}', [
//    'uses' => 'SubAdminCoursesController@destroy',
//    'as' => 'subadmin.courses.delete'
// ]);


/* Users Client Section */
Route::get('users/{id}',[
    'uses' => 'SubAdminUsersController@index',
    'as' => 'subadmin.users'
]);

// Route::get('users/client',[
//     'uses' => 'subadminUsersController@indexClient',
//     'as' => 'subadmin.user'
// ]);

Route::get('users/show/{id}',[
    'uses' => 'SubAdminUsersController@show',
    'as' => 'subadmin.user.show'
]);

Route::get('users/edit/{id}',[
    'uses' => 'SubAdminUsersController@edit',
    'as' => 'subadmin.user.edit'
]);

Route::post('users/update/{id}',[
    'uses' => 'SubAdminUsersController@update',
    'as' => 'subadmin.user.update'
]);

Route::get('users/delete/{id}',[
    'uses' => 'SubAdminUsersController@destroy',
    'as' => 'subadmin.user.delete'
]);

/* Booking Follow Up Show */
Route::get('bookings/follow_up',[
    'uses' => 'SubAdminBookingFollowUpController@index',
    'as' => 'subadmin.booking.followup'
]);

Route::post('bookings/follow_up/store',[
    'uses' => 'SubAdminBookingFollowUpController@store',
    'as' => 'subadmin.booking.followup.store'
]);

Route::get('bookings/follow_up/show/{id}',[
    'uses' => 'SubAdminBookingFollowUpController@show',
    'as' => 'subadmin.booking.followup.show'
]);

// Booking Routes ###########################

Route::get('booking',[
    'uses'=>'SubAdminBookingController@index',
    'as'=>'subadmin.booking'
]);

Route::get('booking/show/{id}',[
    'uses'=>'SubAdminBookingController@show',
    'as'=>'subadmin.booking.show'
]);
Route::post('booking/accept',[
    'uses'=>'SubAdminBookingController@accept',
    'as'=>'subadmin.booking.accept'
]);

// PR Migartion #####################

Route::get('prmigration',[
    'uses'=>'SubAdminPrmigationController@index',
    'as'=>'subadmin.prmigration'
]);

Route::post('prmigration/store',[
    'uses'=>'SubAdminPrmigationController@store',
    'as'=>'subadmin.prmigration.store'
]);

/* Application Routes */
Route::get('application',[
    'uses'=>'SubAdminApplicationController@index',
    'as'=>'subadmin.application'
]);

Route::get('application/show/{id}',[
    'uses'=>'SubAdminApplicationController@applicationCreate',
    'as'=>'subadmin.application.create'
]);

Route::post('application/document/store',[
    'uses'=>'SubAdminApplicationController@documentStore',
    'as'=>'subadmin.application.document'
]);

Route::post('application/document/delete',[
    'uses' =>'SubAdminApplicationController@destroy',
    'as'=>'subadmin.application.document.destroy'
]);

Route::post('application/offer/decline',[
    'uses' => 'SubAdminApplicationController@offerDecline',
    'as'=>'subadmin.application.offer.decline'
]);


/* Application Apply */
Route::post('application/apply',[
    'uses' => 'SubAdminApplicationController@applicationApply',
    'as' => 'subadmin.application.apply'
]);

Route::post('application/approval',[
    'uses' => 'SubAdminApplicationController@applicationApprovel',
    'as' => 'subadmin.application.approval'
]);

Route::post('application/accepted',[
    'uses' => 'SubAdminApplicationController@applicationAccepted',
    'as' => 'subadmin.application.accepted'
]);

Route::post('application/readytofly',[
    'uses' => 'SubAdminApplicationController@applicationReady',
    'as' => 'subadmin.application.readytofly'
]);

Route::post('application/update/university',[
    'uses' =>'SubAdminApplicationController@universityUpdate',
    'as'=>'subadmin.application.update.university'
]);


/* Application Follow Up */
Route::get('applications/followup',[
    'uses' => 'SubAdminApplicationFollowUpController@index',
    'as' => 'subadmin.application.followup'
]);

Route::get('applications/followup/create',[
    'uses' => 'SubAdminApplicationFollowUpController@create',
    'as' => 'subadmin.application.followup.create'
]);

Route::post('applications/followup/store',[
    'uses' => 'SubAdminApplicationFollowUpController@store',
    'as' => 'subadmin.application.followup.store'
]);

Route::get('applications/followup/show/{id}',[
    'uses' => 'SubAdminApplicationFollowUpController@show',
    'as' => 'subadmin.application.followup.show'
]);


// Advertisement ################################

Route::get('advertisement',[
    'uses'=>'SubAdminAdvertisementController@index',
    'as'=>'subadmin.advertisement_manager'
]);
Route::post('advertisement/update',[
    'uses'=>'SubAdminAdvertisementController@update',
    'as'=>'subadmin.advertisement_manager.update'
]);


/* Add User */
Route::get('users/user/add',[
    'uses'=>'SubAdminUsersController@add',
    'as'=>'subadmin.user.add'
]);
Route::post('users/user/store',[
    'uses'=>'SubAdminUsersController@store',
    'as'=>'subadmin.user.store'
]);

Route::get('export', 'SubAdminExcelController@export')->name('export');
Route::get('importExportView', 'SubAdminExcelController@importExportView');
Route::post('import', 'SubAdminExcelController@import')->name('subadminImport');



// #########################################################################

// #########################################################################

Route::get('commission/{id}',[
    'uses' => 'subadminCommissionController@index',
    'as'=> 'subadmin.commission'
]);

Route::get('commission/edit/{id}',[
    'uses' => 'subadminCommissionController@edit',
    'as'=> 'subadmin.commission.edit'
]);

Route::post('commission/update/{id}',[
    'uses'=>'subadminCommissionController@update',
    'as'=> 'subadmin.commission.update'
]);

/* Messenger  */

Route::get('messenger', [
    'uses' => 'SubAdminMessengerController@index',
    'as' => 'subadmin.messenger'
]);

Route::post('messenger/fetchData', [
    'uses' => 'SubAdminMessengerController@fetchData',
    'as' => 'subadmin.messenger.fetchdata'
]);

Route::post('messenger/sendMessage', [
    'uses' => 'SubAdminMessengerController@sendMessage',
    'as' => 'subadmin.messenger.sendmessage'
]);
});



