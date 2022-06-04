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
        $data =  DB::select("select SoldProducts from products");
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
        //Places Select        
        $data=  DB::select('select * from places where place_id=?',[$id]);

        $product_name=$data[0]->product;
        $quantity_Store=$data[0]->quantity;

        //Products Select
        $data=  DB::select('select * from products where name=?',[$product_name]);

        $Sold_Products=$data[0]->SoldProducts;
        $Products_Quantity=$data[0]->quantity;
        
        #the user input -- that is to be added to Sold and substracted from exsiting quantity
        $Sold= $request->input('quantity');
        
        #substracting the existing quantity at that Store
        $newQuantity=(int)$quantity_Store-(int)$Sold;

        
        $NEW_SoldProducts=$Sold+$Sold_Products;
        $NEW_quantity=$Products_Quantity-$Sold;


        DB::update('update products set SoldProducts=?, quantity=? where name=? ',[$NEW_SoldProducts,$NEW_quantity,$product_name]);
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