<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class userController extends Controller
{
    public function view()
    {
        return view('users');
    }

    /*public function ViewUsers()
    {
        //
        $data=DB::select("select * from users");
        $arr['data']=$data;

        return view('users',$arr);
        
    }*/
}