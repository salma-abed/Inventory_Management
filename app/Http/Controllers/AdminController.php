<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Models\places;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewPlaces()
    {
        //
        $data = DB::select("select * from places");
        $arr['data'] = $data;

        return view('admin/placesAdminPage', $arr);
    }

    public function destroyPlace($place_id)
    {
        DB::delete('delete from places where place_id=? ',[$place_id]);
        return redirect('places');

    }


    
    public function updatePlace(Request $request, $id)
    {
       $place_name= $request->input('place_name');
       $type=$request->input('type_of_place');
       $place_location= $request->input('place_location');
       $product= $request->input('product_name');
       $quantity= $request->input('quantity');

       DB::update('update places set place_name =?, place_type=?, place_address= ?,product= ?,quantity=? where place_id=? ',[$place_name,$type,$place_location,$product,$quantity,$id]);
       $data=  DB::select("select * from places");
       $arr['data']=$data;

       return redirect('places');  //redirects sends to the page specified
    }



    public function AddPlace(Request $request)
    {
        $Object = new places();

        $request->validate([
            'place_name' => 'required',
            'place_location' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'type_of_place' => 'required'

        ]);

        if ($_POST['product_name'] != null) {
            if ($_POST['quantity'] == null) {
                $Object->quantity = 0;
            } else
                $Object->quantity = strip_tags($request->input('quantity'));
        }

        //POST

        //need to get the place type here to store in db and to chose which if condition to run => $Object->place_type = $request->input::pluck('carlist');
        $Object->place_name = strip_tags($request->input('place_name'));
        $Object->product = strip_tags($request->input('product_name'));
        $Object->place_address = strip_tags($request->input('place_location'));
        $Object->place_type = strip_tags($request->input('type_of_place'));


        $Object->save();
        return back(); //basically refreshes after data is sent.


    }


    public function DeletePlace($place_id)
    {
        DB::delete('delete from places where place_id=? ', [$place_id]);
        return redirect('places');
    }


    public function index()
    {
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
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
        ]);
        //POST
        $Object = new Admin();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteProduct($product_id)
    {
        DB::delete('delete from products where product_id=? ', [$product_id]);
        return redirect('productsAdmin');
    }
}