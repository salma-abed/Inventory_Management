<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function view()
    {
        return view('users');
    }

    public function ViewUsers()
    {
        //
        $data=DB::select("select * from users");
        $arr['data']=$data;

        return view('users',$arr);
        

    }


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
}