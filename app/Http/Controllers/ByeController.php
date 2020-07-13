<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ByeController extends Controller
{
    public function doneMethod() {
        // return 'method';
        return view('bye.bye');
    }
}
