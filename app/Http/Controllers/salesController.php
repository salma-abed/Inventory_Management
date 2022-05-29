<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;

class SalesController extends Controller
{
    public function view()
    {
        return view('salespeople/storesTable');
    }
}