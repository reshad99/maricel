<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckMail;
use App\Models\Reservation;
use DB, Validator;

class ReserveController extends Controller
{
    public function index()
    {
        $data['reservations'] = Reservation::all();
        return view('back.reservations.index', $data);
    }

    public function check(Request $request)
    {
        try 
        {
            $id = $request->id;
            $num = $request->num;

            $reserve = Reservation::find($id);
            $reserve->confirm = $num;
            $reserve->update();

            $email = $reserve->email;
            if ($num != 0) 
            {
                Mail::to($email)->send(new CheckMail());
            }
            
            return $num;
        } catch (\Exception $e) {
            return $e;
        }
        

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Reservation::destroy($id);
    }
}
