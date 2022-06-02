<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{

    public function index()
    {
        //
        $data=DB::select("select * from places");
        $arr['data']=$data;

        return view('admin/placesAdminPage',$arr);
        
    }
}
