@extends('layouts.default')
<!DOCTYPE html>

<body>
    @section('content')
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <!-- Modal -->
    <!-------Add product Form--------->
    <div class="modal fade" id="productmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formElement" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="@error('name') is-invalid @enderror form-control" id="name"
                                name="name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <input type="text" class="@error('location') is-invalid @enderror form-control"
                                id="location" name="location">
                            @error('location')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <input type="text" class="@error('description') is-invalid @enderror form-control"
                                id="description" name="description">
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="text" class="@error('price') is-invalid @enderror form-control" id="price"
                                name="price">
                            @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="@error('quantity') is-invalid @enderror form-control"
                                id="quantity" name="quantity">
                            @error('quantity')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>


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
        $('#productmodal').modal('show');
    });
    </script>
    @endif

    <!--<strong> @error('name') <h1>{{$message}}</h1>@enderror</strong>
    <strong> @error('location') <h1>{{$message}}</h1>@enderror</strong>
    <strong> @error('description') <h1>{{$message}}</h1>@enderror</strong>-->

    <!---------------------------------->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1><i class="fa-solid fa-paw"> Meow,</i> <span>Welcome Here</span></h1>
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
                                        data-bs-target="#product" type="button" role="tab" aria-controls="product"
                                        aria-selected="true">All Products</button>
                                </li>
                            </ul>


                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="product" role="tabpanel"
                                    aria-labelledby="product-tab">

                                    <table class="table" id="productTable">
                                        <thead>
                                            <tr>
                                                <th>Products Name</th>
                                                <th>Location</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        @foreach($data as $row)
                                        <tr>
                                            <th>{{$row->name}}</th>
                                            <th>{{$row->location}}</th>
                                            <th>{{$row->description}} </th>
                                            <th>{{$row->price}}</th>
                                            <th>{{$row->quantity}}</th>
                                            <td> <a data-bs-target="#editmodal" href="edit1/{{$row->product_id}}"><i
                                                        class="far fa-edit"></i></i>
                                                </a></td>

                                            </a></td>
                                            <td>
                                                <!-- Modal for delete confirmation -->
                                                <form id="formElement" method="GET"
                                                    action="delete1/{{$row->product_id}}">
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
                                                <!--  <a id="delete" href="delete1/{{$row->product_id}}"><i
                                                        class="fa-regular fa-trash-can"></i>
                                                </a>-->
                                                <a href="#myModal" class="trigger-btn" data-bs-toggle="modal"><i
                                                        class="fa-regular fa-trash-can"></i> </a>


                                            </td>
                                            @endif
                                        </tr>

                                        @endforeach
                                    </table>

                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#productmodal">Add
                                            Product</button>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    if $("#formElement").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50
            },
            location: {
                required: true,

            },
            description: {
                required: true,
            },
            price: {
                required: true,
            },
            quantity: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Please enter product name",
            },
            location: {
                required: "Please enter product location",
            },
            description: {
                required: "Please enter product description",
            },
            price: {
                required: "Please enter product price",
            },
            quantity: {
                required: "Please enter product quantity",
            },
        },
    })
    </script>
    @endsection
</body>