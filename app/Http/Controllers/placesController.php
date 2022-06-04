<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\places;
use App\Models\history;



class placesController extends Controller
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

        return view('admin/productsAdminPage', $arr);
    }
    public function EditPlace($places_id)
    {
        //            
        $data=  DB::select('select * from places where place_id=?',[$places_id]);
        return view('admin/Edit_place',['data'=>$data]);
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


    public function Transport(Request $request)
    {

        $From_place = $request->input('From_place');
        $Product = $request->input('product');
        $quantity_From = DB::table('places')->select('quantity as AA')->where('place_name', $From_place)->where('product', $Product)->first();

        $quantity_From = (int)$quantity_From->AA;
        $PLUS = (int)$request->input('quantity');
        $quantity_From = $quantity_From + $PLUS;
        DB::update('update places set quantity=? where place_name=? ', [$quantity_From, $From_place]);



        $To_place = $request->input('To_place');
        $quantity = DB::table('places')->select('quantity as AA')->where('place_name', $To_place)->where('product', $Product)->first();

        $quantity = (int)$quantity->AA;
        $quantity = $quantity - $PLUS;
        DB::update('update places set quantity=? where place_name=? ', [$quantity, $To_place]);



        $StringHistory = "An amout of: " . $PLUS . " of Product: " . $Product . " has been transported from " . $From_place . " to " . $To_place;

        $Object = new history();
        $Object->transaction_description = $StringHistory;
        $Object->transaction_date = date("Y/m/d");

        $Object->save();



        return redirect('places');  //redirects sends to the page specified
    }
}