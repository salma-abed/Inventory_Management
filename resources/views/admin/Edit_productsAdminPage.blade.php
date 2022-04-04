@extends('layouts.default')
<!DOCTYPE html>

<body>
    @section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class=" login-form">
                    <h3>Edit</h3>
                    <form id="formElement" method="POST" action="/update1/{{$data[0]->product_id}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Place Name</label>
                            <input type="text" class="form-control" id="name" value="{{$data[0]->name}}"
                                name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="location"
                                value="{{$data[0]->location}}" name="location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">description</label>
                            <input type="text" class="form-control" id="description" value="{{$data[0]->description}}"
                                name="description">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" value="{{$data[0]->price}}"
                                name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" value="{{$data[0]->quantity}}"
                                name="quantity">
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