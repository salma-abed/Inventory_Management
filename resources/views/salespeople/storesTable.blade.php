@extends('layouts.default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')
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
                                    <li class="breadcrumb-item active">Stores</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                <!-- TAPS -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="stores-tab" data-bs-toggle="tab"
                                        data-bs-target="#stores" type="button" role="tab" aria-controls="stores"
                                        aria-selected="false">Stores</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="stores" role="tabpanel"
                                    aria-labelledby="stores-tab">
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
                                            ##
                                        </tbody>

                                    </table>

                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#productmodal">Edit Product</button>
                                    </div>

                                    <div class="container-fluid p-t-10">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#productmodal">Delet Product</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
</body>