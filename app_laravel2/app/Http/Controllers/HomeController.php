<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
}
