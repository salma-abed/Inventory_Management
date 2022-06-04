<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Storages;
class StoragesController extends Controller
{

    public function GetProductQuantity()
    {
        $data =  DB::select("select quantity from products");
        $arr['data'] = $data;

        return view('admin/productsAdminPage', $arr);

    }

}
