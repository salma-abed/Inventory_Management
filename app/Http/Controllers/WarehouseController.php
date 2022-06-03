<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewProducts()
    {
        //
        $data =  DB::select("select * from products");
        $arr['data'] = $data;

        return view('admin/productsAdminPage', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetProductQuantity()
    {
        $data =  DB::select("select quantity from products");
        $arr['data'] = $data;

        return view('admin/productsAdminPage', $arr);

    }

    public function GetLocations()
    {
        $data =  DB::select("select location from products");
        $arr['data'] = $data;

        return view('admin/productsAdminPage', $arr);

    }

}