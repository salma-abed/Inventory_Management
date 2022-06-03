<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Courier;
class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetProductQuantity()
    {
        $data =  DB::select("select quantity from products");
        $arr['data'] = $data;

        return view('admin/productsAdminPage', $arr);

    }
}