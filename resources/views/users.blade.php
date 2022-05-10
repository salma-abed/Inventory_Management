@extends('layouts/default')
@section('content')
<div class="content-wrap">
    <div class="main">
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
                                <li class="breadcrumb-item"><a href="#">Main Menu</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                                    aria-selected="true">Employess Data </button>

                        </ul>


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="places" role="tabpanel"
                                aria-labelledby="places-tab">

                                <table class="table" id="placesTable">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Number</th>
                                            <th>Postion</th>
                                        </tr>
                                    </thead>
                                </table>

                                <div class="container-fluid p-t-10">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#productmodal">Add User</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endsection