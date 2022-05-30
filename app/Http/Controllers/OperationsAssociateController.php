<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OperationsAssociate;

class OperationsAssociateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $Object = new OperationsAssociate();
        $Object->name = strip_tags($request->input('name'));
        $Object->location = strip_tags($request->input('location'));
        $Object->description = strip_tags($request->input('description'));
        $Object->price = strip_tags($request->input('price'));
        $Object->quantity = strip_tags($request->input('quantity'));
        $Object->save();

        return back(); //basically refreshes after data is sent.
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
        return redirect('productsOA');
    }
}