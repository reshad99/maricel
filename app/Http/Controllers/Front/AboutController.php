<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $data['about'] = About::first();
        return view('front.about', $data);
    }
}
