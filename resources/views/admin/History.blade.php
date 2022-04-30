@extends('layouts.default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')

    <!-- Modal -->
        
    <div class="col-lg-6">
              <div class="card">
                <div class="card-title">
                  <h4>Recent Project </h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover ">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Kolor Tea Shirt For Man</td>
                          <td>
                            <span class="badge badge-primary">Ongoing</span>
                          </td>
                          <td>January 22</td>
                          <td class="color-primary">$21.56</td>
                        </tr>
                        <tr>
                          <td>Kolor Tea Shirt For Women</td>
                          <td>
                            <span class="badge badge-success">Complete</span>
                          </td>
                          <td>January 30</td>
                          <td class="color-success">$55.32</td>
                        </tr>
                        <tr>
                          <td>Blue Backpack For Baby</td>
                          <td>
                            <span class="badge badge-danger">Rejected</span>
                          </td>
                          <td>January 25</td>
                          <td class="color-danger">$14.85</td>
                        </tr>
                        <tr>
                          <td>Kolor Tea Shirt For Man</td>
                          <td>
                            <span class="badge badge-primary">Ongoing</span>
                          </td>
                          <td>January 22</td>
                          <td class="color-primary">$21.56</td>
                        </tr>
                        <tr>
                          <td>Kolor Tea Shirt For Women</td>
                          <td>
                            <span class="badge badge-success">Complete</span>
                          </td>
                          <td>January 30</td>
                          <td class="color-success">$55.32</td>
                        </tr>
                        <tr>
                          <td>Blue Backpack For Baby</td>
                          <td>
                            <span class="badge badge-danger">Rejected</span>
                          </td>
                          <td>January 25</td>
                          <td class="color-danger">$14.85</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  
    <!--showing error msg when field is submitted empty-->




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
                    <form id="formElement" method="POST" action="/update/{{$data[0]->transaction_id}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Place Name</label>
                            <input type="text" class="form-control" id="transaction_description" value="{{$data[0]->transaction_description}}"
                                name="transaction_description">
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

                            </ul>

                            <!-- DISPLAY -->




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