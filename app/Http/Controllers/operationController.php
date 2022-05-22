<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class operationController extends Controller
{
    public function view()
    {
        return view('operationspeople/operations');
    }
}