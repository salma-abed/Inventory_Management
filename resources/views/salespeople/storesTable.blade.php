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


                <!-----search bar--------->
                <input type="text" class="search" id="se" name="se" placeholder="Search..">
                <!------------------------->

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

                                        
                                        <tr>
                                            @if($row->place_type=='Store')

                                            <th>{{$row->place_name}}</th>
                                            <th>{{$row->place_address}}</th>
                                            <th>{{$row->product}} </th>
                                            <th>{{$row->quantity}}</th>
                                            <th>{{$row->place_type}}</th>
                                            <td>
                                                <a href="EditQuantity/{{$row->place_id}}">
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
                                        @endif
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