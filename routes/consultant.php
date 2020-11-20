<?php
   Route::group(['middleware' => 'role:consultant'], function () {
    Route::get('dash', function(){
     
       return "consultant";
   });
   });