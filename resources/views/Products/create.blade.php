@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Add new product</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="/products">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                <small class="text-danger">@error('name'){{$message}}@enderror</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" value="{{old('price')}}">
                                <small class="text-danger">@error('price'){{$message}}@enderror</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}">
                                <small class="text-danger">@error('quantity'){{$message}}@enderror</small>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection