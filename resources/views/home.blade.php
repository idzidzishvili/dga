@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">1. Generate token</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Generate token to use for further request</p>
                    <button class="btn btn-primary" id="getToken">Generate token</button>
                    <p class="mt-3 mb-0"><span id="generatedToken"></span></p>
                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection