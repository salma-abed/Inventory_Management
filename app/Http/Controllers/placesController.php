<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\places;

class placesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Object = new places();

            $request->validate([
                'place_name'=> 'required',
                'place_location'=>'required',
                'type_of_place'=>'required'

            ]);

            // if($isset($_POST['product']))
            // {
            //     if(!$isset($_POST['quantity'])){
            //     $Object->product_quantity = 0;                }
            // }

            //POST

            //need to get the place type here to store in db and to chose which if condition to run => $Object->place_type = $request->input::pluck('carlist');
            $Object->place_name = strip_tags($request->input('place_name'));
            $Object->place_address = strip_tags($request->input('place_location'));
            $Object->place_type = strip_tags($request->input('type_of_place'));

            $Object->save();
            return back(); //basically refreshes after data is sent.


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
