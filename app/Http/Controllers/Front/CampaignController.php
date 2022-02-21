<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use DB;

class CampaignController extends Controller
{
    public function index()
    {
        $data['cards'] = Card::all();
        return view('front.campaign', $data);
    }

    public function get_card(Request $request)
    {
        try 
        {
            $id = $request->id;
            $data = Card::select(['name_'.app()->getLocale().' as name', 'text_'.app()->getLocale().' as text'])
            ->where('id', $id)->first();
            return $data;
        } catch (\Exception $e) {
            return $e;
        }
        
    }
}
