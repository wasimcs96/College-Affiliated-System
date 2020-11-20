<?php
   Route::group(['middleware' => 'role:client'], function () {
    Route::get('dash', function(){

       return "client";
   });
   });
