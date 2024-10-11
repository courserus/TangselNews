<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    public function  front_end()
    {
        return view('front_end');
    }
}
