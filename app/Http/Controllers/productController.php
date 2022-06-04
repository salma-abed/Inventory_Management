<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  //default when controller is created 
use Illuminate\Support\Facades\DB;
use App\Models\products;


class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data =  DB::select("select * from products");
        $arr['data'] = $data;

        return view('admin/productsAdminPage', $arr);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddProduct(Request $request)
    {

        //POST
        $Object = new products();
        $Object->name = strip_tags($request->input('name'));
        $Object->location = strip_tags($request->input('location'));
        $Object->description = strip_tags($request->input('description'));
        $Object->price = strip_tags($request->input('price'));
        $Object->quantity = strip_tags($request->input('quantity'));
        $Object->save();

        return back(); //basically refreshes after data is sent.
    }


    public function vali(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
        ]);

        return redirect()->route('products.AddProduct');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ViewOldProductData($product_id)
    {
        //        
        $data =  DB::select('select * from products where product_id=?', [$product_id]);
        return view('admin/Edit_productsAdminPage', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateProduct(Request $request, $id)
    {
        $place_name = $request->input('name');
        $place_location = $request->input('location');
        $place_description = $request->input('description');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        DB::update('update products set name =?, location= ?,description= ?, price=?, quantity=? where product_id=? ', [$place_name, $place_location, $place_description, $price, $quantity, $id]);
        $data =  DB::select("select * from products");
        $arr['data'] = $data;

        if (!is_null($data)) {
            return redirect('products')->with("success", "Updated successfully");
        } else {
            return back()->with("failed", "Update failed. Try again.");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteProduct($product_id)
    {
        //
        DB::delete('delete from products where product_id=? ', [$product_id]);
        return redirect('products');
    }
    public function edit_count($product_quantity)
    {
        //        
        $data =  DB::select('select * from products where product_quantity=?', [$product_quantity]);
        return view('admin/Edit_productsAdminPage', ['data' => $data]);
    }
}
