<?php
   Route::group(['middleware' => 'role:client'], function () {
    Route::get('dash', function(){

       return "client";
   });
   /* Client */
Route::get('bookings',function(){
    return view('client.bookings');
})->name('client.bookings');

Route::get('mystatus',function(){
    return view('client.mystatus');
})->name('client.mystatus');
   });
