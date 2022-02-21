<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Group;
use App\Models\About;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['about'] = About::first();
        return view('front.home', $data);
    }
    
    public function lang($lang)
    {
        $languages = ['az', 'ru', 'en'];
        if (in_array($lang, $languages)) {
            \Session::put('lang', $lang);
        }
        return redirect()->back();
    }
}
