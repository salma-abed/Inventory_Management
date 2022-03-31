@extends('layouts/layoutNavbar')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')
    <!-------Add product Form--------->
    <div id="ModalExample" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Add Product</h1>
                </div>
                <div class="modal-body">
                    <form id="formElement" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity">
                        </div>
                        <button type="button" class="btn btn-primary">Submit</button>
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
                                    <button class="nav-link active" id="products-tab" data-bs-toggle="tab"
                                        data-bs-target="#products" type="button" role="tab" aria-controls="products"
                                        aria-selected="true">All Products</button>
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
                                <div class="tab-pane fade show active" id="products" role="tabpanel"
                                    aria-labelledby="products-tab">

                                    <table class="table" id="productTable">
                                        <thead>
                                            <tr>

                                                <th>Product Name</th>
                                                <th>Location</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                    </table>


                                    <button type="button" class="btn btn-sm btn-primary" id="updateButton"
                                        data-toggle="modal" data-target="#ModalExample" onclick="showForm()">Add
                                        Product</button>


                                </div>
                                <div class="tab-pane fade" id="warehouses" role="tabpanel"
                                    aria-labelledby="warehouses-tab">
                                    <table class="table" id="makeEditable1">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Branch Name</th>
                                                <th>View Products</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>

                                    </table>
                                    <span>
                                        <button type="button" class="btn btn-sm btn-primary" id="but_add1">Add
                                            Branch</button>
                                    </span>

                                </div>
                                <div class="tab-pane fade" id="printinghouses" role="tabpanel"
                                    aria-labelledby="printinghouses-tab">
                                    <table class="table" id="makeEditable2">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Branch Name</th>
                                                <th>View Products</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <span>
                                        <button type="button" class="btn btn-sm btn-primary" id="but_add2">Add
                                            Branch</button>
                                    </span>
                                </div>
                                <div class="tab-pane fade" id="stores" role="tabpanel" aria-labelledby="stores-tab">
                                    <table class="table" id="makeEditable3">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Branch Name</th>
                                                <th>View Products</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <span>
                                        <button type="button" class="btn btn-sm btn-primary" id="but_add3">Add
                                            Branch</button>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
    $('#makeEditable').SetEditable({
        onEdit: function() {},
        onDelete: function() {},
        onBeforeDelete: function() {},
        onAdd: function() {},
        $addButton: $('#but_add')
    });

    function showForm() {
        document.getElementById('formElement').style.display = 'block';
    }
    </script>
    @endsection
</body>