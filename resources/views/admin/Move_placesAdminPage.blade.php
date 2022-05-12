@extends('layouts.default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')

  

    <!--showing error msg when field is submitted empty-->

    <strong> @error('product') <h1>{{$message}}</h1>@enderror</strong>


    <!-------Test Form--------->
    <div id="placemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Place</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formElement" method="POST" action="Transport">
                        @csrf
                    <div>
                        <label class="form-label">From facility </label>
                        <select id="From_place" name="From_place">
                                @foreach($data as $row)
                                        <tr>
                                            <option>{{$row->place_name}}</option>
                                        </tr>
                                @endforeach
                        </select>
                    
                        <label class="form-label">To Facility </label>
                        <select id="To_place" name="To_place">
                                @foreach($data as $row)
                                        <tr>
                                            <option>{{$row->place_name}}</option>
                                        </tr>
                                @endforeach
                        </select>
                    </div>



                    <div>
                        <label class="form-label">Product </label>
                        <select id="product" name="product">
                                @foreach($data as $row)
                                        <tr>
                                        <option>{{$row->product}} </option>
                                        </tr>
                                @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    <strong> @error('quantity') <h1>{{$message}}</h1>@enderror</strong>

                    </form>

                </div>
            </div>
        </div>
        </div>



    @endsection
</body>