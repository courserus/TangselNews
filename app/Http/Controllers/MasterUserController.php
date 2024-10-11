<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    public function  master_user()
    {
        return view('master_user');
    }
}
