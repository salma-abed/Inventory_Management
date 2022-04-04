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
        $data=  DB::select("select * from products");
        $arr['data']=$data;
   
        return view('admin/productsAdminPage',$arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        //        
        $data=  DB::select('select * from products where product_id=?',[$product_id]);
        return view('admin/Edit_productsAdminPage',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $place_name= $request->input('name');
        $place_location=$request->input('location');
        $place_description= $request->input('description');
        $price= $request->input('price');
        $quantity= $request->input('quantity');
 
        DB::update('update products set name =?, location= ?,description= ?, price=?, quantity=? where product_id=? ',[$place_name,$place_location,$place_description,$price,$quantity,$id]);
        $data=  DB::select("select * from products");
        $arr['data']=$data;
 
        return redirect('products');  //redirects sends to the page specified    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        //
        DB::delete('delete from products where product_id=? ',[$product_id]);
        return redirect('products');
    }
}