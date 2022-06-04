@extends('layouts.default')
<!DOCTYPE html>

<body>
    @section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class=" login-form">
                    <h3>Edit</h3>
                    <form id="formElement" method="POST" action="/updatePlace/{{$data[0]->place_id}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Place Name</label>
                            <input type="text" class="@error('place_name') is-invalid @enderror form-control"
                                id="place_name" value="{{$data[0]->place_name}}" name="place_name">
                            @error('place_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="@error('place_location') is-invalid @enderror form-control"
                                id="place_location" value="{{$data[0]->place_address}}" name="place_location">

                            @error('location')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <input type="text" class="@error('product_name') is-invalid @enderror form-control"
                                id="product_name" value="{{$data[0]->product}}" name="product_name">
                            @error('product_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="@error('quantity') is-invalid @enderror form-control"
                                id="quantity" value="{{$data[0]->quantity}}" name="quantity">
                            @error('quantity')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <label class="form-label">facility </label>
                        <select id="type_of_place" name="type_of_place">
                            <option value="Warehouse">Warehouse</option>
                            <option value="Printhouse">Printhouse</option>
                            <option value="Store">Store</option>
                        </select>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @endsection
</body>

</html>