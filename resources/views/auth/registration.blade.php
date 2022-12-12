@extends('dashboard')
@section('title', 'register')
@section('content')
    <div class="signup-form">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h4 class="card-header text-center">Register</h4>
                        <div class="card-body">
                            <form action="{{ url('custom-registration') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Name </label>
                                    <input value = "{{old ('name')}}" type="text" placeholder="Enter Your Name" id="name" class="form-control"
                                        name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Email </label>
                                    <input value = "{{old ('email')}}" type="text" placeholder="Enter Your Email" id="email_address" class="form-control"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Password </label>
                                    <input value = "{{old ('passwords')}}" type="password" placeholder="Enter Your Password" id="password" class="form-control"
                                        name="passwords" required>
                                    @if ($errors->has('passwords'))
                                        <span class="text-danger">{{ $errors->first('passwords') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Confirm Password </label>
                                    <input value = "{{old ('confirm_password')}}" type="password" placeholder="Re-type Your Password" id="password"
                                        class="form-control" name="confirm_password" required>
                                    @if ($errors->has('confirm_password'))
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Gender </label><br>
                                    <!-- <input type="radio" placeholder="Confirm Password" id="password"
                                                            class="form-control" name="confirm_password" required> -->
                                    <input type="radio" id="male" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }}>
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>
                                    <label for="female">Female</label><br>
                                    @if ($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Date of Birth </label>
                                    <input value = "{{ old ('date_of_birth', date ('mm/dd/yyyy')) }}"type="date" class="form-control" name="date_of_birth" value="date_of_birth"
                                        id="date_of_birth">
                                    @if ($errors->has('date_of_birth'))
                                        <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"> Country </label>
                                    <select class="form-select form-select-sm" name="country_id" value="country_id"
                                        id="country_id">
                                        <option selected>Choose a country</option>
                                        @foreach ($countries as $country)
                                            @if (old('country_id') == $country->id)
                                                <option value="{{ $country->id }}" selected> {{ $country->country }} </option>
                                            @else
                                                <option value="{{ $country->id }}"> {{ $country->country }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Register</button>
                                </div>
                                <div class="form-group mb-2 mt-3">
                                    Don't have an account? <u><a href="{{ url('login') }}">Login Here</a></u>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
