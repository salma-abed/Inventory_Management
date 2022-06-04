@extends('layouts.default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
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
                            <input type="text" class="@error('place_name') is-invalid @enderror form-control"
                                id="place_name" name="place_name">
                            @error('place_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="@error('place_location') is-invalid @enderror form-control"
                                id="place_location" name="place_location">
                            @error('place_location')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <input type="text" class="@error('product_name') is-invalid @enderror form-control"
                                id="product_name" name="product_name">
                            @error('product_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="@error('quantity') is-invalid @enderror form-control"
                                id="quantity" name="quantity">
                            @error('quantity')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="form-label">facility </label>
                        <select class="@error('type_of_place') is-invalid @enderror form-control" id="type_of_place"
                            name="type_of_place">
                            <option value="Warehouse">Warehouse</option>
                            <option value="Printhouse">Printhouse</option>
                            <option value="Store">Store</option>
                            <option value="Office">Office </option>
                            <option value="Courier_warehouse">Courier_warehouse</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
    <script>
    $(document).ready(function() {
        $('#placemodal').modal('show');
    });
    </script>
    @endif


    <!--showing error msg when field is submitted empty-->

    <!-- <strong> @error('place_name') <h1>{{$message}}</h1>@enderror</strong>
    <strong> @error('place_location') <h1>{{$message}}</h1>@enderror</strong>-->




    <!---------------------------------->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1><i class="fa-solid fa-paw"> Meow, </i> <span>Welcome Here</span></h1>
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

                <!-----search bar--------->
                <input type="text" class="search" id="se" name="se" placeholder="Search..">
                <!------------------------->

                <!-- TAPS -->
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
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="courier_warehouses-tab" data-bs-toggle="tab"
                                        data-bs-target="#courier_warehouses" type="button" role="tab"
                                        aria-controls="stores" aria-selected="false">Courier_warehouses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="offices-tab" data-bs-toggle="tab"
                                        data-bs-target="#offices" type="button" role="tab" aria-controls="stores"
                                        aria-selected="false">Offices</button>
                                </li>

                            </ul>

                            <!-- DISPLAY -->


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
                                                <th>Edit</th>
                                                <th>Delete</th>



                                            </tr>
                                        </thead>
                                        @foreach($data as $row)
                                        <tr>


                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <th>{{$row->place_type}}</th>
                                            <td>
                                                <a href="EditPlace/{{$row->place_id}}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET" action="delete/{{$row->place_id}}">
                                                    @csrf
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot
                                                                        be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>
                                            </td>

                                        </tr>

                                        @endforeach
                                    </table>

                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add Place</button>

                                        <a href=http://127.0.0.1:8000/show>
                                            <button type="button" class="btn btn-sm btn-primary"> Transport products
                                            </button></a>
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
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                            <td>
                                                <a href="EditPlace/{{$row->place_id}}"> <i class="far fa-edit"></i> </a>
                                            </td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET" action="delete/{{$row->place_id}}">
                                                    @csrf
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot
                                                                        be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>
                                            </td>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>
                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add Place</button>

                                        <a href=http://127.0.0.1:8000/show>
                                            <button type="button" class="btn btn-sm btn-primary"> Transport products
                                            </button></a>
                                    </div>

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
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                            <td>
                                                <a href="EditPlace/{{$row->place_id}}"> <i class="far fa-edit"></i> </a>
                                            </td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET" action="delete/{{$row->place_id}}">
                                                    @csrf
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot
                                                                        be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>
                                            </td>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach

                                    </table>
                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add Place</button>

                                        <a href=http://127.0.0.1:8000/show>
                                            <button type="button" class="btn btn-sm btn-primary"> Transport products
                                            </button></a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="stores" role="tabpanel" aria-labelledby="stores-tab">
                                    <table class="table" id="storetable">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                            <td>
                                                <a href="EditPlace/{{$row->place_id}}"> <i class="far fa-edit"></i> </a>
                                            </td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET" action="delete/{{$row->place_id}}">
                                                    @csrf
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot
                                                                        be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>
                                            </td>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>
                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add Place</button>

                                        <a href=http://127.0.0.1:8000/show>
                                            <button type="button" class="btn btn-sm btn-primary"> Transport products
                                            </button></a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="offices" role="tabpanel" aria-labelledby="offices-tab">
                                    <table class="table" id="officestable">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            @if($row->place_type=='Office')

                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <td>
                                                <a href="EditPlace/{{$row->place_id}}"> <i class="far fa-edit"></i> </a>
                                            </td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET" action="delete/{{$row->place_id}}">
                                                    @csrf
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot
                                                                        be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>
                                            </td>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>
                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add Place</button>

                                        <a href=http://127.0.0.1:8000/show>
                                            <button type="button" class="btn btn-sm btn-primary"> Transport products
                                            </button></a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="courier_warehouses" role="tabpanel"
                                    aria-labelledby="courier_warehouses-tab">
                                    <table class="table" id="courier_warehousestable">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Location</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            @if($row->place_type=='Courier_warehouse')

                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <td>
                                                <a href="EditPlace/{{$row->place_id}}"> <i class="far fa-edit"></i> </a>
                                            </td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET" action="delete/{{$row->place_id}}">
                                                    @csrf
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot
                                                                        be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>
                                            </td>
                                            @endif
                                        </tr>
                                        </thead>
                                        @endforeach
                                    </table>
                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#placemodal">Add Place</button>

                                        <a href=http://127.0.0.1:8000/show>
                                            <button type="button" class="btn btn-sm btn-primary"> Transport products
                                            </button></a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $('#se').on('keyup', function() {

        $value = $(this).val();

        $.ajax({

            type: 'get',

            url: '{{URL::to('
            search ')}}',

            data: {
                'se': $value
            },

            success: function(data) {

                $('tbody').html(data);

            }

        });

    })
    </script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
    </script>
    @endsection
</body>