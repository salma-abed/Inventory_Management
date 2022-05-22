<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class salesController extends Controller
{
    public function view()
    {
        return view('salespeople/storesTable');
    }
}