@extends('layouts.default')
<!DOCTYPE html>

<body>
    @section('content')

    <!-- Modal -->
    <!-------Add product Form--------->
    <div class="modal fade" id="productmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formElement" method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <strong> @error('name') <h1>{{$message}}</h1>@enderror</strong>
    <strong> @error('location') <h1>{{$message}}</h1>@enderror</strong>
    <strong> @error('description') <h1>{{$message}}</h1>@enderror</strong>



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
                    <form id="formElement" method="POST" action="/update/{{$data[0]->product_id}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>

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
                                                <th>Edits</th>
                                                <th>Deletes</th>

                                            </tr>
                                        </thead>
                                        @foreach($data as $row)
                                        <tr>
                                            <th>{{$row->name}}</th>
                                            <th>{{$row->location}}</th>
                                            <th>{{$row->description}} </th>
                                            <th>{{$row->price}}</th>
                                            <th>{{$row->quantity}}</th>
                                            <td> <a  data-bs-target="#editmodal"
                                                    href="edit1/{{$row->product_id}}"><i class="far fa-edit"></i></i>
                                                </a></td>

                                                </a></td>
                                                <td> <a href="delete1/{{$row->product_id}}"><i class="far fa-edit"></i></i>
                                                </a></td>

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
    @endsection
</body>