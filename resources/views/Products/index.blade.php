@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Product list</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        @if(count($products))
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $i=>$product)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <a class="btn btn-info pt-0 mr-2" href="/products/{{$product->id}}/edit">Edit</a>
                                        <button class="btn btn-danger pt-0" data-toggle="modal" data-target="#Modal{{$product->id}}">Delete</button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Are you sure?</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="products/{{$product->id}}" method="post">
                                                    @method('DELETE') @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <span class="text-danger">No products were found.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection