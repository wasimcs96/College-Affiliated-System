<?php
   Route::group(['middleware' => 'role:subadmin'], function () {
    Route::get('dash', function(){

       return "subadmin";
   });
//    Route::get('dashboard',function(){
//     return view('client.dashboard');
// })->name('client.dashboard');
});
