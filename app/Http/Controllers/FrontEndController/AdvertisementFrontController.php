<?php

namespace App\Http\Controllers\FrontEndController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class AdvertisementFrontController extends Controller
{
    public function advertisementCount(Request $request)
    {
      $advertise=Advertisement::find($request->linkclick);
      $advertise->click_count=$advertise->click_count+1;
    $advertise->save();
    }
}
