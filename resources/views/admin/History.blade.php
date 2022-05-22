@extends('layouts.default')
<!DOCTYPE html>
<html lang="en">

<body>
    @section('content')

    <!-- Modal -->
        

    <!--showing error msg when field is submitted empty-->




    <!---------------------------------->

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


                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="places" role="tabpanel"
                                    aria-labelledby="places-tab">
                                    <table class="table" id="placesTable">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Date</th>



                                            </tr>
                                        </thead>
                                        @foreach($data as $row)
                                        <tr>


                                            <th>{{$row->transaction_id}}</th>
                                            <th>{{$row->transaction_description}}</th>
                                            <th>{{$row->transaction_date}} </th>


                                        </tr>
                                        
                                        @endforeach
                                    </table>






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