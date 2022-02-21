<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GameStage;
use App\Models\TopScorer;

class MenleagueController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::get();
        $data['gamestages'] = GameStage::get();
        $data['topscorers'] = TopScorer::get();
        return view('front.men-league', $data);
    }
}
