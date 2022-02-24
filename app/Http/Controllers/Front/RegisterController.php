<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\RegisterMail;
use App\Models\Register;
use App\Models\Card;
use Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('front.register', compact('cards'));
    }

    public function post(Request $request)
    {
        try {

            if ($request->ajax()) {
                $rules = [
                    'name' => 'required',
                    'phone' => 'required|unique:registers,phone',
                    'email' => 'required|email|unique:registers,email',
                    'card_id' => 'required|numeric|min:1|max:4',
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(['status' => 0, 'error' => $validator->errors()->first()], 400);
                }
                else
                {
                    $name    = $request->name;
                    $phone   = $request->phone;
                    $email   = $request->email;
                    $card_id = $request->card_id;

                    $register = new Register;

                    $register->name = $name;
                    $register->phone = $phone;
                    $register->email = $email;
                    $register->card_id = $card_id;
                    $register->save();

                    $card_name = $register->card->name_az;

                    Mail::to("hello@maricel.az")->send(new RegisterMail($name, $phone, $email, $card_name));
                    return response()->json(['message' => 'Sorğunuz təsdiq olundu. Sizinlə qısa müddətdə əlaqə saxlanılacaq.'], 200);
                }

            }


        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }
}
