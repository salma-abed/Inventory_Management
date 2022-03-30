<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="/js/bootstable.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/helper.css">

</head>
</body>
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
                                <button class="nav-link" id="stores-tab" data-bs-toggle="tab" data-bs-target="#stores"
                                    type="button" role="tab" aria-controls="stores"
                                    aria-selected="false">Stores</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="products" role="tabpanel"
                                aria-labelledby="products-tab">

                                <table class="table" id="makeEditable">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Default</td>
                                            <td>Defaultson</td>
                                            <td>def@somemail.com</td>
                                        </tr>
                                        <tr class="success">
                                            <td>Success</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>Danger</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr class="info">
                                            <td>Info</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>Warning</td>
                                            <td>Refs</td>
                                            <td>bo@example.com</td>
                                        </tr>
                                        <tr class="active">
                                            <td>Active</td>
                                            <td>Activeson</td>
                                            <td>act@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <span>
                                    <button id="but_add">Add New Row</button>
                                </span>
                                <script>
                                $('#makeEditable').SetEditable({
                                    onEdit: function() {},
                                    onDelete: function() {},
                                    onBeforeDelete: function() {},
                                    onAdd: function() {},
                                    $addButton: $('#but_add')
                                });
                                </script>

                            </div>
                            <div class="tab-pane fade" id="warehouses" role="tabpanel" aria-labelledby="warehouses-tab">
                                ...</div>
                            <div class="tab-pane fade" id="printinghouses" role="tabpanel"
                                aria-labelledby="printinghouses-tab">
                                ...</div>
                            <div class="tab-pane fade" id="stores" role="tabpanel" aria-labelledby="stores-tab">
                                ...</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>