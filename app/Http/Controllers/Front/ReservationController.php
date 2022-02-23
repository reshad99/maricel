<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Register;
use App\Models\Card;
use Validator, DB;

class ReservationController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('front.reservation', compact('cards'));
    }

    public function post(Request $request)
    {
        try {
                    if ($request->ajax())
                {
                    $rules = [
                        'name' => 'required',
                        'phone' => 'required|unique:reservations,phone',
                        'email' => 'required|email|unique:reservations,email',
                        'card_number' => 'required|max:8',
                        'date' => 'required|date',
                    ];

                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {
                        return response()->json(['error' => $validator->errors()->first()], 400);
                    }
                    else
                    {
                        $name        = $request->name;
                        $phone       = $request->phone;
                        $email       = $request->email;
                        $card_number = $request->card_number;
                        $date        = $request->date;
                        if (Register::where('email', $email)->where('phone', $phone)->where('card_number', $card_number)->exists())
                        {

                            $reserve = new Reservation;
                            $reserve->name        = $name;
                            $reserve->phone       = $phone;
                            $reserve->email       = $email;
                            $reserve->card_number = $card_number;
                            $reserve->date        = $date;
                            $reserve->save();

                            return response()->json(['message' => 'Sorğunuz qəbul olundu. Təsdiq mesajı qısa müddət ərzində email-inizə göndəriləcək.'], 200);
                        }
                        else
                        {
                            return response()->json(['error' => 'Bazada belə bir qeydiyyat mövcud deyil.'], 404);
                        }


                    }
                }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    public function reserved_dates()
    {
        $data = array();

        $dates = Reservation::where('confirm', 1)->select(['date'])->get();

        foreach ($dates as $d) {
            array_push($data, $d->date);
        }

        return response()->json($data);
    }
}
