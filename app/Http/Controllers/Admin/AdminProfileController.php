<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminProfileController extends Controller
{
  public function profile()
  {
      return view('admin.profile');
  }
}
