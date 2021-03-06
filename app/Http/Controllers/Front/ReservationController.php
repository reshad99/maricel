<?php

namespace App\Http\Controllers\Front;

use DateTime;
use Validator, DB;
use App\Models\Card;
use App\Models\Register;
use App\Mail\ReserveMail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
                        'card_id' => 'required|numeric|min:1|max:4',
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
                        $card_id     = $request->card_id;
                        $date        = $request->date;
                        if (Register::where('email', $email)->where('phone', $phone)->where('card_number', $card_number)->where('card_id', $card_id)->exists())
                        {

                            $reserve = new Reservation;
                            $reserve->name        = $name;
                            $reserve->phone       = $phone;
                            $reserve->email       = $email;
                            $reserve->card_number = $card_number;
                            $reserve->card_id     = $card_id;
                            $reserve->date        = $date;
                            $reserve->save();

                            $card_name = $reserve->card->name_az;

                            Mail::to('residence@maricel.az')->send(new ReserveMail($name, $email, $phone, $card_number, $card_name));

                            return response()->json(['message' => 'Sor??unuz q??bul olundu. T??sdiq mesaj?? q??sa m??dd??t ??rzind?? email-iniz?? g??nd??ril??c??k.'], 200);
                        }
                        else
                        {
                            return response()->json(['error' => 'Bazada bel?? bir qeydiyyat m??vcud deyil.'], 404);
                        }


                    }
                }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    public function reserved_dates(Request $request)
    {
        $card_id = $request->card_id;
        $data = array();

        $earlier = new DateTime();
        $later = new DateTime("2022-06-02");
        $pos_diff = $earlier->diff($later)->format("%r%a");
        $possible_count = '';

        if ($card_id == 1) {
            $possible_count = 19;
        }
        elseif ($card_id == 2) {
            $possible_count = 6;
        }
        elseif ($card_id == 3) {
            $possible_count = 4;
        }
        elseif ($card_id == 4) {
            $possible_count = 5;
        }

        for ($i=0; $i < $pos_diff; $i++) {

            $date = $earlier->format('Y-m-d');
            $actual_count = Reservation::where('confirm', 1)->where('date', $date)->where('card_id', $card_id)->count();
            if ($actual_count >= $possible_count)
            {
                array_push($data, $date);
            }
            $earlier = $earlier->modify('+1 day');

        }

        return response()->json($data);
    }
}
