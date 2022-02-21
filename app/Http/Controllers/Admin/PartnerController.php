<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $data['partners'] = DB::table('partners')->get();
        return view('back.partners.index', $data);
    }

    public function index_add()
    {
        return view('back.partners.add');
    }

    public function post_add(Request $request)
    {
        $rules = [
            'logo' => 'required|file|mimes:jpg,png,jpeg,webp',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $link = $request->input('link');
        $logo = $request->file('logo');

        $logo_name = uniqid().".".$logo->getClientOriginalExtension();
        $logo->move(public_path('images/partners/'), $logo_name);

        DB::table('partners')->insert(['link' => $link, 'logo' => $logo_name]);

        return redirect('admin/partners')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (DB::table('partners')->where('id', $id)->exists()) 
        {
            $data['partner'] = DB::table('partners')->where('id', $id)->first();
            return view('back.partners.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }
    
    public function post_edit(Request $request, $id)
    {
        if (DB::table('partners')->where('id', $id)->exists()) 
        {
            $action = DB::table('partners')->where('id', $id)->first();

            $rules = [
                'logo' => 'file|mimes:jpg,png,jpeg,webp',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $logo = $request->file('logo');
            $link = $request->link;

            if (!is_null($logo)) 
            {
                \File::delete(public_path('images/partners/'.$action->logo));
                $logo_name = uniqid().".".$logo->getClientOriginalExtension();
                $logo->move(public_path('images/partners'), $logo_name);
            }
            else {
                $logo_name = $action->logo;
            }
            
    
            DB::table('partners')->where('id', $id)->update(['link' => $link,'logo' => $logo_name]);
    
            return redirect('admin/partners')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = Partner::findOrFail($id);
        \File::delete(public_path('images/partners/'.$action->logo));
        $action->delete();
        return redirect()->back();
    }
}
