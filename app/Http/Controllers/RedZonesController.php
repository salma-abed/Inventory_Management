<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RedZonesController extends Controller
{
    public function SendNotification(Request $request, $id)
    {
        $From_place = $request->input('From_place');
        $Product = $request->input('product');
        $quantity = DB::table('places')->select('quantity as AA')->where('place_name', $From_place)->where('product', $Product)->first();

        $quantity = (int)$quantity->AA;
        $PLUS = (int)$request->input('quantity');
        $quantity = $quantity - $PLUS;
        DB::update('update places set quantity=? where place_name=? ', [$quantity, $From_place]);
        $range = 1000;

        if ($quantity < $range) {

            $String = "An amout of: " . $PLUS . " of Product: " . $Product . " is being out of stcok from " . $From_place;
        }
        DB::update('update places set quantity=? where place_name=? ', [$quantity, $From_place]);
    }
}