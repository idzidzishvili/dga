@extends('layouts.dashboard')
@section('content')
    <form method="post" action="/products/{{$product->id}}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Product name</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" name="name" value="{{$product->name}}">
                <small class="text-danger">@error('name'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="price"  value="{{$product->price}}">
                <small class="text-danger">@error('price'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="quantity"  value="{{$product->quantity}}">
                <small class="text-danger">@error('quantity'){{$message}}@enderror</small>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Update product</button>
    </form>
@endsection
