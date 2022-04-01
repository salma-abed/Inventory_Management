@include('layouts/layoutMainmenu')
<!DOCTYPE html>
<html lang="en">

<head>

    @section('content')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name </th>
                <th scope="col">Address</th>
                <th scope="col">Number</th>
                <th scope="col">Postion</th>
                <th scope="col">Bottons</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td> <button class="btn"><i class="fa fa-trash"></i></button>
                    <button class="btn"><i class="fas fa-edit"></i></button>
                </td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td> <button class="btn"><i class="fa fa-trash"></i></button>
                    <button class="btn"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td> <button class="btn"><i class="fa fa-trash"></i></button>
                    <button class="btn"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
            <td> <button class="btn"><i class="fa-duotone"></i></button>

            </td>

            <div class=" login-form">
                <h4>Add New User</h4>
                <form>
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Enter Address</label>
                        <input type="text" class="form-control" placeholder="text">
                    </div>
                    <div class="form-group">
                        <label>Enter Address</label>
                        <input type="text" class="form-control" placeholder="text">
                    </div>
                    <div class="form-group">
                        <label>Number</label>
                        <input type="number" class="form-control" placeholder="number">
                    </div>
                    <div class="form-group">
                        <label>Position </label>
                        <input type="text" class="form-control" placeholder="text">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Male
                        </label>
                        <label class="pull-right">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Female
                                </label>

                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                            <div class="social-login-content">
                                <div class="social-button">

                                </div>
                            </div>

                </form>
            </div>
            </div>
            </div>
        </tbody>
    </table>
    @endsection

</body>

</html>