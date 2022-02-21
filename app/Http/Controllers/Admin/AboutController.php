<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;

class AboutController extends Controller
{
    public function index()
    {
        $data['abouts'] = DB::table('abouts')->get();
        return view('back.about.index', $data);
    }

    public function edit()
    {
        if (DB::table('abouts')->where('id', 1)->exists()) 
        {
            $data['about'] = DB::table('abouts')->where('id', 1)->first();
            return view('back.about.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request)
    {
        if (DB::table('abouts')->where('id', 1)->exists()) 
        {
            $about = DB::table('abouts')->where('id', 1)->first();

            $rules = [
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
                'name_2_az' => 'required',
                'name_2_en' => 'required',
                'name_2_ru' => 'required',
                'text_az' => 'required',
                'text_en' => 'required',
                'text_ru' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $name_az = $request->input('name_az');
            $name_en = $request->input('name_en');
            $name_ru = $request->input('name_ru');
            $name_2_az = $request->input('name_2_az');
            $name_2_en = $request->input('name_2_en');
            $name_2_ru = $request->input('name_2_ru');
            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');
            
    
            DB::table('abouts')->where('id', 1)->update(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'name_2_az' => $name_2_az, 'name_2_en' => $name_2_en, 'name_2_ru' => $name_2_ru, 'text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru,]);
    
            return redirect('admin/about')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
