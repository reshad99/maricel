<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function optimize()
    {
        \Artisan::call('optimize');
        return 'Optimized Succesfully';
    }
}
