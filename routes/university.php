<?php
   Route::group(['middleware' => 'role:university'], function () {
    Route::get('dash', function(){
     
       return "university";
   });
   });