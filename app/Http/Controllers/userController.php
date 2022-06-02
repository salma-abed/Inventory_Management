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
<<<<<<< HEAD

        $data = DB::select("select * from places");
        $arr['data'] = $data;
=======
        //
        $data=DB::select("select * from users");
        $arr['data']=$data;
>>>>>>> ab0f4be1f87d0dca65ad07e75552d23db73d863b

        return view('users',$arr);
        
    }*/
}