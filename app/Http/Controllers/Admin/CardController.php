<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use DB, Validator;

class CardController extends Controller
{
    public function index()
    {
        $data['cards'] = DB::table('cards')->get();
        return view('back.cards.index', $data);
    }

    public function edit($id)
    {
        if (Card::findOrFail($id)) 
        {
            $data['card'] = Card::find($id);
            return view('back.cards.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('cards')->where('id', $id)->exists()) 
        {
            $action = DB::table('cards')->where('id', $id)->first();

            $rules = [
                'photo' => 'nullable|file|mimes:jpg,png,jpeg,webp',
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
                'text_az' => 'required',
                'text_en' => 'required',
                'text_ru' => 'required'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $photo   = $request->file('photo');
            $name_az = $request->input('name_az');
            $name_en = $request->input('name_en');
            $name_ru = $request->input('name_ru');
            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');

            if (!is_null($photo)) 
            {
                \File::delete('/images/cards/'.$action->photo);
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/cards'), $photo_name);
            }
            else {
                $photo_name = $action->photo;
            }

            
    
            DB::table('cards')->where('id', $id)->update(['text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'photo' => $photo_name, 'name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru]);
    
            return redirect('admin/cards')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
