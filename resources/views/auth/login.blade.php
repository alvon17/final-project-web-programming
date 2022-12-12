@extends('dashboard')
@section('title', 'login')
@section('content')
    @if (session()->has('message'))
        @foreach (explode('-', session('message')) as $message)
            <script>
                Swal.fire('{{$message}}')
            </script>
        @endforeach
    @endif
    <!-- <script> Swal.fire('Any fool can use a computer') </script> -->

    <div class="login-form">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h4 class="card-header text-center">Login</h4>
                        <div class="card-body">
                            <form method="POST" action="{{ url('custom-login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Enter Your Email" id="email" class="form-control"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Enter Your Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($error = $errors->first('password'))
                                        <span class="text-danger">{{ $error }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto w-25">
                                    <button type="submit" class="btn btn-dark btn-block">Login</button>
                                </div>
                                <div class="form-group mb-2 mt-3">
                                    Don't have an account? <u><a href="{{ url('registration') }}">Register Here</a></u>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
