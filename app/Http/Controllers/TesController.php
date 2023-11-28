<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function app ()
    {
        
        return view('tes.index');
    }
}
