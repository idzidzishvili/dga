@extends('layouts.dashboard')
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Blacklist new IP address</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="/ipblacklist">
                        @csrf
                        <div class="form-group row">
                            <label for="ipaddress" class="col-sm-2 col-form-label">ipaddress</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ipaddress" value="{{old('ipaddress')}}">
                                <small class="text-danger">@error('ipaddress'){{$message}}@enderror</small>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Blacklist IP</button>
                    </form>
                </div>
            </div>


            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Blacklisted IP addresses</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        @if(count($ipAddresses))
                        <h3>Blacklisted IP addresses</h3>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ipAddresses as $i=>$ipaddr)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$ipaddr->ipaddress}}</td>
                                    <td>
                                        <button class="btn btn-danger pt-0" data-toggle="modal" data-target="#Modal{{$ipaddr->id}}">Delete</button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal{{$ipaddr->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <form action="ipblacklist/{{$ipaddr->id}}" method="post">
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
                        <span class="text-danger">No blacklisted IPs.</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>








@endsection