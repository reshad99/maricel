<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use DB, Validator;

class ContactController extends Controller
{
    public function index()
    {
        $data['contacts'] = Contact::get();
        return view('back.contact.index', $data);
    }

    public function edit()
    {
        if (DB::table('contacts')->where('id', 1)->exists()) 
        {
            $data['contact'] = DB::table('contacts')->where('id', 1)->first();
            return view('back.contact.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request)
    {
        if (DB::table('contacts')->where('id', 1)->exists()) 
        {
            $about = DB::table('contacts')->where('id', 1)->first();

            $rules = [
                'address_az' => 'required',
                'address_en' => 'required',
                'address_ru' => 'required',
                'phone1' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $address_az = $request->input('address_az');
            $address_en = $request->input('address_en');
            $address_ru = $request->input('address_ru');
            $instagram  = $request->instagram;
            $twitter    = $request->twitter;
            $facebook   = $request->facebook;
            $youtube    = $request->youtube;
            $phone1     = $request->input('phone1');
            $email      = $request->input('email');
            
    
            DB::table('contacts')->where('id', 1)->update(['address_az' => $address_az, 'address_en' => $address_en, 'address_ru' => $address_ru, 'instagram' => $instagram, 'twitter' => $twitter, 'facebook' => $facebook, 'youtube' => $youtube, 'phone1' => $phone1, 'email' => $email]);
    
            return redirect('admin/contact')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
