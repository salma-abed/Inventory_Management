@include('layoutMainmenu')
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
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Bottons</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>  <button class="btn"><i class="fa fa-trash"></i></button>
            <button class="btn"><i class="fas fa-edit"></i></button> </td>

    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>  <button class="btn"><i class="fa fa-trash"></i></button>
            <button class="btn"><i class="fas fa-edit"></i></button> </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>  <button class="btn"><i class="fa fa-trash"></i></button>
            <button class="btn"><i class="fas fa-edit"></i></button> </td>
    </tr>
  </tbody>
</table>
@endsection
    
</body>
</html>