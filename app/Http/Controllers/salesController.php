<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;

class SalesController extends Controller
{
    public function UpdateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
        ]);

        $place_name = $request->input('name');
        $place_location = $request->input('location');
        $place_description = $request->input('description');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        DB::update('update products set name =?, location= ?,description= ?, price=?, quantity=? where product_id=? ', [$place_name, $place_location, $place_description, $price, $quantity, $id]);
        $data =  DB::select("select * from products");
        $arr['data'] = $data;


        return redirect('productsAdmin');
    }
    
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