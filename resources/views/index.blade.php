@extends('dashboard')

@section('title', 'home')
@section('content')
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" placeholder="Insert Product Name">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>

@endsection
