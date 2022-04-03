@extends('layouts/default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')

    <!-------Add Warehouse Form--------->
    <div class="modal fade" id="warehousemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Warehouse Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formElement">
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" class="form-control" id="quantity">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch name</label>
                            <input type="text" class="form-control" id="productname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="location">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
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
                                    <li class="breadcrumb-item active">Warehouses</li>
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
                                    <button class="nav-link" id="warehouses-tab" data-bs-toggle="tab"
                                        data-bs-target="#warehouses" type="button" role="tab" aria-controls="warehouses"
                                        aria-selected="false">Warehouses</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="warehouses" role="tabpanel"
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