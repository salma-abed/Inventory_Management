<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;

class SalesController extends Controller
{
    public function view()
    {
         //
         $data = DB::select("select * from places where place_type=Store");
         $arr['data'] = $data;
 
        return view('salespeople/storesTable', $arr);
    }

    public function UpdateQuantity(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        DB::update('update places set quantity=? where place_id=?, place_type=Store', [$quantity, $id, $place_type]);
        $data =  DB::select("select * from places");
        $arr['data'] = $data;

        if (!is_null($data)) {
            return redirect('products')->with("success", "Updated successfully");
        } else {
            return back()->with("failed", "Update failed. Try again.");
        }
    }
}