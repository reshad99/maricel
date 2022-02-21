<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ActionController extends Controller
{
    public function index()
    {
        $data['actions'] = DB::table('actions')->get();
        return view('front.action', $data);
    }

    public function show($slug)
    {
        if (DB::table('actions')->where('slug', $slug)->exists()) 
        {
            $data['action'] = DB::table('actions')->where('slug', $slug)->first();
            return view('front.action-single', $data);
        }
        
    }
}
