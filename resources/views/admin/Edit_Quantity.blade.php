@extends('layouts.default')
<!DOCTYPE html>

<body>
    @section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class=" login-form">
                    <h3>Selling</h3>
                    <form id="formElement" method="POST" action="/updateQuantity/{{$data[0]->place_id}}">
                        @csrf
                        
                       
                       
                        <div class="mb-3">
                            <label class="form-label">enter Quantity to sell</label>
                            <input type="text" class="@error('quantity') is-invalid @enderror form-control" id="quantity"  name="quantity">
                            @error('quantity')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @endsection
</body>

</html>