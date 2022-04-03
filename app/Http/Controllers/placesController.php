<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data=  DB::select("select * from places");
        $arr['data']=$data;

        return view('admin/placesAdminPage',$arr);
        
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

            if($_POST['product_name']!= null)
            {
                if($_POST['quantity']==null)
                {
                    $Object->quantity = 0;                
                }
                else
                $Object->quantity = strip_tags($request->input('quantity'));

            }

            //POST

            //need to get the place type here to store in db and to chose which if condition to run => $Object->place_type = $request->input::pluck('carlist');
            $Object->place_name = strip_tags($request->input('place_name'));
            $Object->product = strip_tags($request->input('product_name'));
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
    public function edit($places_id)
    {
        //       
        $data=  DB::select('select * from places where place_id=?',[$places_id]);
        return view('admin/Edit_placesAdminPAge',['data'=>$data]);
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
       $place_name= $request->input('place_name');
       $type=$request->input('type_of_place');
       $place_location= $request->input('place_location');
       $product= $request->input('product_name');
       $quantity= $request->input('quantity');

       DB::update('update places set place_name =?, place_type=?, place_address= ?,product= ?,quantity=? where place_id=? ',[$place_name,$type,$place_location,$product,$quantity,$id]);
       return view('dashboard');
    
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

    public function search(Request $request)
    {
            if($request->ajax()){
            $output="";
            $places=DB::table('places')->where('place_name','LIKE','%'.$request->search."%")->get();

            if($places){
                foreach ($places as $key => $places) {
                    $output.='<tr>'.
                    '<td>'.$places->place_name.'</td>'.
                    '<td>'.$places->place_type.'</td>'.
                    '<td>'.$places->place_address.'</td>'.
                    '<td>'.$places->product.'</td>'.
                    '<td>'.$places->quantity.'</td>'.
                    '</tr>';
                }
                return Response('admin/placesAdminPage', $output);
            }
        }
        
        
    }
}