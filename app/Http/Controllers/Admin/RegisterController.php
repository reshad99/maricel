<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Register;
use App\Mail\NumberMail;
use DB, Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $data['registers'] = Register::all();
        return view('back.registers.index', $data);
    }

    public function post_card_number(Request $request)
    {

        try {
            $id = $request->id_hidden;
            $card_number = $request->card_number;
            $register = Register::find($id);
            $register->card_number = $card_number;
            $register->update();

            $name = $register->name;
            $email = $register->email;
            $phone = $register->phone;
            $card_name = $register->card->name_az;
            Mail::to($email)->send(new NumberMail($name, $email, $phone, $card_number, $card_name));

            return $register;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Register::destroy($id);
    }
}
