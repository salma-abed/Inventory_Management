<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Store;
use App\Models\places;

class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CheckProductQuantity()
    {
        $data =  DB::select("select quantity from products");
        $arr['data'] = $data;

        return view('salespeople/storesTable', $arr);
    }
    public function SoldProductQuantity()
    {
        $data =  DB::select("select quantity from products");
        $arr['data'] = $data;

        return view('salespeople/storesTable', $arr);
    }
    
    
    public function EditQuantity($places_id)
    {
        $data=  DB::select('select * from places where place_id=?',[$places_id]);
        return view('admin/Edit_Quantity',['data'=>$data]);


    }
    

    public function updateQuantity(Request $request, $id)
    {


        $data=  DB::select('select * from places where place_id=?',[$id]);

        $quantityDB=$data[0]->quantity;

        $quantityUser= $request->input('quantity');

        $newQuantity=(int)$quantityDB-(int)$quantityUser;


        DB::update('update places set quantity=? where place_id=? ',[$newQuantity,$id]);


        return redirect('Stores');    //redirects sends to the page specified
        
    }

    public function ViewProducts()
    {
        $data =  DB::select("select * from places");
        $arr['data'] = $data;

        return view('salespeople/storesTable', $arr);
    }
    public function GetLocations()
    {
        $data =  DB::select("select location from products");
        $arr['data'] = $data;

        return view('salespeople/storesTable', $arr);
    }
    public function GetProductQuantity()
    {
        $data =  DB::select("select quantity from products");
        $arr['data'] = $data;

        return view('salespeople/storesTable', $arr);
    }
  
}