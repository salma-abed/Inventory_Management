<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WarehouseManager;

class WarehouseManagerController extends Controller
{
    public function index()
    {
        //
        $data=DB::select("select * from places");
        $arr['data']=$data;

        return view('admin/placesAdminPage',$arr);
        
    }
}