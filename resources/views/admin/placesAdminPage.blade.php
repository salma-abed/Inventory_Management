@extends('layouts.default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')

    <!-- Modal -->
    <!-------Add place Form--------->
    <div class="modal fade" id="placemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Place</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formElement" method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Place Name</label>
                            <input type="text" class="form-control" id="place_name" name="place_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="place_location" name="place_location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>

                        <label class="form-label">facility </label>
                        <select id="type_of_place" name="type_of_place">
                            <option value="Warehouse">Warehouse</option>
                            <option value="Printhouse">Printhouse</option>
                            <option value="Store">Store</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--showing error msg when field is submitted empty-->
    <div class="alert warning">
        <strong> @error('place_name') <h1>{{$message}}</h1>@enderror</strong>
    </div>

    <div class="alert warning">
        <strong> @error('place_location') <h1>{{$message}}</h1>@enderror</strong>
    </div>


    <!---------------------------------->

    <!-------Edit Form------------->
    <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formElement" method="POST" action="/update/{{$data[0]->place_id}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Place Name</label>
                            <input type="text" class="form-control" id="place_name" name="place_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="place_location" name="place_location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>

                        <label class="form-label">facility </label>
                        <select id="type_of_place" name="type_of_place">
                            <option value="Warehouse">Warehouse</option>
                            <option value="Printhouse">Printhouse</option>
                            <option value="Store">Store</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!---------------------------------->
    <div class="content-wrap">
        <div class="main p-l-200">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Meow, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Inventory</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="places-tab" data-bs-toggle="tab"
                                        data-bs-target="#places" type="button" role="tab" aria-controls="places"
                                        aria-selected="true">All Places</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="warehouses-tab" data-bs-toggle="tab"
                                        data-bs-target="#warehouses" type="button" role="tab" aria-controls="warehouses"
                                        aria-selected="false">Warehouses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="printinghouses-tab" data-bs-toggle="tab"
                                        data-bs-target="#printinghouses" type="button" role="tab"
                                        aria-controls="printinghouses" aria-selected="false">Printinghouses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="stores-tab" data-bs-toggle="tab"
                                        data-bs-target="#stores" type="button" role="tab" aria-controls="stores"
                                        aria-selected="false">Stores</button>
                                </li>

                            </ul>


                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="places" role="tabpanel"
                                    aria-labelledby="places-tab">

                                    <table class="table" id="placesTable">
                                        <thead>
                                            <tr>
                                                <th>Place Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Place_type</th>
                                                <th>Edits</th>

                                            </tr>
                                        </thead>
                                        @foreach($data as $row)
                                        <tr>
                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <th>{{$row->place_type}}</th>
                                            <td> <a data-bs-toggle="modal" data-bs-target="#editmodal"
                                                    href="edit/{{$row->place_id}}"><i class="far fa-edit"></i></i>
                                                </a></td>

                                        </tr>

                                        @endforeach
                                    </table>

                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add
                                            Place</button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="warehouses" role="tabpanel"
                                    aria-labelledby="warehouses-tab">
                                    <table class="table" id="warehousetable">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            @if($row->place_type=='Warehouse')

                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <th>{{$row->place_type}}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>


                                </div>
                                <div class="tab-pane fade" id="printinghouses" role="tabpanel"
                                    aria-labelledby="printinghouses-tab">
                                    <table class="table" id="printinghousetable">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            @if($row->place_type=='Printhouse')

                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <th>{{$row->place_type}}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>

                                </div>
                                <div class="tab-pane fade" id="stores" role="tabpanel" aria-labelledby="stores-tab">
                                    <table class="table" id="storetable">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            @if($row->place_type=='Store')

                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <th>{{$row->place_type}}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>