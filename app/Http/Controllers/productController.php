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


}
