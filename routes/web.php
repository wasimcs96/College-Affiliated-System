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
Route::get('blog_all',function(){
    return view('frontEnd.blog.blog_all');
})->name('blog_all');

Route::get('blog_detail',function(){
    return view('frontEnd.blog.blog_detail');
})->name('blog_detail');

// ######## loan route
Route::get('loan',function(){
    return view('frontEnd.loan.loan');
})->name('loan');

// about and contact
Route::get('about', function(){
    return view('frontEnd.about.about');
})->name('about');

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



// Route::get('index', function(){
//     return view('frontEnd.index');
// })->name('frontend.index');

Route::get('index',[
    'uses'=>'FrontEndController\FrontEndController@index',
    'as'=>'frontend.index'
]);

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

/* My Page */
Route::get('mypage', function ()                { return redirect('mypage/index'); });
Route::get('mypage/index',                      'MypageController@index')->name('mypage.index');
Route::get('mypage/index4',                     'MypageController@index4')->name('mypage.index4');
Route::get('mypage/index5',                     'MypageController@index5')->name('mypage.index5');
Route::get('mypage/index6',                     'MypageController@index6')->name('mypage.index6');
Route::get('mypage/index7',                     'MypageController@index7')->name('mypage.index7');
Route::get('mypage/index8',                     'MypageController@index8')->name('mypage.index8');
Route::get('mypage/index9',                     'MypageController@index9')->name('mypage.index9');
Route::get('mypage/index10',                    'MypageController@index10')->name('mypage.index10');

/* My Page */
Route::get('dashboard', function ()             { return redirect('dashboard/index2'); });
Route::get('dashboard/index2',                  'DashboardController@index2')->name('dashboard.index2');
Route::get('dashboard/index3',                  'DashboardController@index3')->name('dashboard.index3');


/* App */
// Route::get('contact', function ()               { return redirect('contact/contact'); });
// Route::get('contact/contact',                   'ContactController@contact')->name('contact.contact');
// Route::get('contact/contact2',                  'ContactController@contact2')->name('contact.contact2');

/* App */
Route::get('app', function ()                   { return redirect('app/contact'); });
Route::get('app/calendar',                      'AppController@calendar')->name('app.calendar');

/* email */
Route::get('email', function ()                 { return redirect('email/inbox'); });
Route::get('email/inbox',                       'EmailController@inbox')->name('email.inbox');
Route::get('email/compose',                     'EmailController@compose')->name('email.compose');
Route::get('email/inboxdetail',                 'EmailController@inboxdetail')->name('email.inboxdetail');

/* messenger */
Route::get('messenger', function ()             { return redirect('messenger/chat'); });
Route::get('messenger/chat',                    'MessengerController@chat')->name('messenger.chat');

/* Icons */
Route::get('icon', function ()                  { return redirect('icon/fontawesome'); });
Route::get('icon/fontawesome',                  'IconController@fontawesome')->name('icon.fontawesome');
Route::get('icon/iconsline',                    'IconController@iconsline')->name('icon.iconsline');
Route::get('icon/themify',                      'IconController@themify')->name('icon.themify');

/* Components  */
Route::get('components', function ()            { return redirect('components/bootstrap'); });
Route::get('components/bootstrap',              'ComponentsController@bootstrap')->name('components.bootstrap');
Route::get('components/typography',             'ComponentsController@typography')->name('components.typography');
Route::get('components/colors',                 'ComponentsController@colors')->name('components.colors');
Route::get('components/buttons',                'ComponentsController@buttons')->name('components.buttons');
Route::get('components/tabs',                   'ComponentsController@tabs')->name('components.tabs');
Route::get('components/progressbars',           'ComponentsController@progressbars')->name('components.progressbars');
Route::get('components/modals',                 'ComponentsController@modals')->name('components.modals');
Route::get('components/notifications',          'ComponentsController@notifications')->name('components.notifications');
Route::get('components/dialogs',                'ComponentsController@dialogs')->name('components.dialogs');
Route::get('components/listgroup',              'ComponentsController@listgroup')->name('components.listgroup');
Route::get('components/mediaobject',            'ComponentsController@mediaobject')->name('components.mediaobject');
Route::get('components/nestable',               'ComponentsController@nestable')->name('components.nestable');
Route::get('components/rangesliders',           'ComponentsController@rangesliders')->name('components.rangesliders');
Route::get('components/helperclass',            'ComponentsController@helperclass')->name('components.helperclass');

/* Forms  */
Route::get('forms', function ()                 { return redirect('forms/basic'); });
Route::get('forms/basic',                       'FormsController@basic')->name('forms.basic');
Route::get('forms/advanced',                    'FormsController@advanced')->name('forms.advanced');
Route::get('forms/validation',                  'FormsController@validation')->name('forms.validation');
Route::get('forms/wizard',                      'FormsController@wizard')->name('forms.wizard');
Route::get('forms/summernote',                  'FormsController@summernote')->name('forms.summernote');
Route::get('forms/dragdropupload',              'FormsController@dragdropupload')->name('forms.dragdropupload');
Route::get('forms/editors',                     'FormsController@editors')->name('forms.editors');
Route::get('forms/markdown',                    'FormsController@markdown')->name('forms.markdown');
Route::get('forms/cropping',                    'FormsController@cropping')->name('forms.cropping');

/* Table  */
Route::get('tables', function ()                { return redirect('tables/normal'); });
Route::get('tables/normal',                     'TablesController@normal')->name('tables.normal');
Route::get('tables/color',                      'TablesController@color')->name('tables.color');
Route::get('tables/datatable',                  'TablesController@datatable')->name('tables.datatable');
Route::get('tables/editable',                   'TablesController@editable')->name('tables.editable');
Route::get('tables/filter',                     'TablesController@filter')->name('tables.filter');
Route::get('tables/dragger',                    'TablesController@dragger')->name('tables.dragger');

/* Table  */
Route::get('charts', function ()                { return redirect('charts/c3'); });
Route::get('charts/c3',                         'ChartsController@c3')->name('charts.c3');
Route::get('charts/chartjs',                    'ChartsController@chartjs')->name('charts.chartjs');
Route::get('charts/morris',                     'ChartsController@morris')->name('charts.morris');
Route::get('charts/flot',                       'ChartsController@flot')->name('charts.flot');
Route::get('charts/sparkline',                  'ChartsController@sparkline')->name('charts.sparkline');
Route::get('charts/knob',                       'ChartsController@knob')->name('charts.knob');

/* Maps  */
Route::get('maps', function ()                  { return redirect('maps/jvectormap'); });
Route::get('maps/jvectormap',                   'MapsController@jvectormap')->name('maps.jvectormap');

/* Maps  */
Route::get('widget', function ()                { return redirect('widget/widgets'); });
Route::get('widget/widgets',                    'WidgetController@widgets')->name('widget.widgets');

/* Pages  */
Route::get('pages', function ()                 { return redirect('pages/blank'); });
Route::get('pages/blank',                       'PagesController@blank')->name('pages.blank');
Route::get('pages/profile',                     'PagesController@profile')->name('pages.profile');
Route::get('pages/userlist',                    'PagesController@userlist')->name('pages.userlist');
Route::get('pages/testimonials',                'PagesController@testimonials')->name('pages.testimonials');
Route::get('pages/invoices',                    'PagesController@invoices')->name('pages.invoices');
Route::get('pages/invoicedetails',              'PagesController@invoicedetails')->name('pages.invoicedetails');
Route::get('pages/timeline',                    'PagesController@timeline')->name('pages.timeline');
Route::get('pages/searchresults',               'PagesController@searchresults')->name('pages.searchresults');
Route::get('pages/gallery',                     'PagesController@gallery')->name('pages.gallery');
Route::get('pages/pricing',                     'PagesController@pricing')->name('pages.pricing');


/* Authentication  */
Route::get('authentication', function ()        { return redirect('authentication/login'); });
Route::get('authentication/login',              'AuthenticationController@login')->name('authentication.login');
Route::get('authentication/login2',             'AuthenticationController@login2')->name('authentication.login2');
Route::get('authentication/register',           'AuthenticationController@register')->name('authentication.register');
Route::get('authentication/forgotpassword',     'AuthenticationController@forgotpassword')->name('authentication.forgotpassword');
Route::get('authentication/page404',            'AuthenticationController@page404')->name('authentication.page404');
Route::get('authentication/maintenance',        'AuthenticationController@maintenance')->name('authentication.maintenance');
Route::get('authentication/comingsoon',         'AuthenticationController@comingsoon')->name('authentication.comingsoon');


/* Extra  */
Route::get('extra', function ()                 { return redirect('extra/social'); });
Route::get('extra/social',                      'ExtraController@social')->name('extra.social');
Route::get('extra/news',                        'ExtraController@news')->name('extra.news');

Route::get('extra/settings',                    'ExtraController@settings')->name('extra.settings');

/* Project   */
Route::get('projects', function ()              { return redirect('projects/taskboard'); });
Route::get('projects/taskboard',                'ProjectsController@taskboard')->name('projects.taskboard');
Route::get('projects/projectlist',              'ProjectsController@projectlist')->name('projects.projectlist');
Route::get('projects/addproject',               'ProjectsController@addproject')->name('projects.addproject');
Route::get('projects/ticket',                   'ProjectsController@ticket')->name('projects.ticket');
Route::get('projects/ticketdetails',            'ProjectsController@ticketdetails')->name('projects.ticketdetails');
Route::get('projects/clients',                  'ProjectsController@clients')->name('projects.clients');
Route::get('projects/todo',                     'ProjectsController@todo')->name('projects.todo');

/* HR   */
Route::get('hr', function ()                    { return redirect('hr/hrdashboard'); });
Route::get('hr/hrdashboard',                    'HrController@hrdashboard')->name('hr.hrdashboard');
Route::get('hr/users',                          'HrController@users')->name('hr.users');
Route::get('hr/departments',                    'HrController@departments')->name('hr.departments');
Route::get('hr/employee',                       'HrController@employee')->name('hr.employee');
Route::get('hr/activities',                     'HrController@activities')->name('hr.activities');
Route::get('hr/holidays',                       'HrController@holidays')->name('hr.holidays');
Route::get('hr/events',                         'HrController@events')->name('hr.events');
Route::get('hr/payroll',                        'HrController@payroll')->name('hr.payroll');
Route::get('hr/accounts',                       'HrController@accounts')->name('hr.accounts');
Route::get('hr/report',                         'HrController@report')->name('hr.report');

/* Card   */
Route::get('cardlayout', function ()            { return redirect('cardlayout/cards'); });
Route::get('cardlayout/cards',                  'CardlayoutController@cards')->name('cardlayout.cards');


/* Card   */
Route::get('job', function ()                   { return redirect('job/jobdashboard'); });
Route::get('job/jobdashboard',                  'JobController@jobdashboard')->name('job.jobdashboard');
Route::get('job/positions',                     'JobController@positions')->name('job.positions');
Route::get('job/applicants',                    'JobController@applicants')->name('job.applicants');
Route::get('job/resumes',                       'JobController@resumes')->name('job.resumes');
Route::get('job/jobsettings',                   'JobController@jobsettings')->name('job.jobsettings');


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

Route::get('/front/loan', [
    'uses' => 'FrontEndController\LoanFrontController@index',
    'as' => 'front.loan'
]);
