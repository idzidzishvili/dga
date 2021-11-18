@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-12">
         <div class="card mb-4">
            <div class="card-header">
               <h5 class="card-title">Requests list</h5>
            </div>
            <div class="card-body">
               <div class="table-responsive mt-4">
                  @if(count($requests))
                  <table class="table table-striped table-sm">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Product Id</th>
                           <th>Token</th>
                           <th>IP Address</th>
                           <th>Date & Time</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($requests as $i=>$request)
                        <tr>
                           <td>{{$i+1}}</td>
                           <td>{{$request->product_id}} ({{$request->name}})</td>
                           <td>{{$request->token}}</td>
                           <td>{{$request->ipaddress}}</td>
                           <td>{{$request->created_at}}</td>
                        </tr>                        
                        @endforeach
                     </tbody>
                  </table>
                  @else
                  <span class="text-danger">No requests were made yet.</span>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection