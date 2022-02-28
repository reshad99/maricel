<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        $data['contact'] = Contact::first();
        return view('front.contact', $data);
    }

    public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        Mail::to("residence@maricel.az")->send(new ContactMail($name, $surname, $email, $phone, $message));
        return redirect()->back()->with('success', 'Mesajınız uğurla göndərildi');
    }
}
