@extends('layouts.auth')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <h3>
                    Login to Task Tracking MIS
                </h3>
                <div class="card-header bg-secondary">
                    <h5 class="text-center text-light">Login</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group my-1">
                            <label for="emailAddress">Email</label>
                            <input type="email" name="email" id="emailAddress" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Email Address" required>

                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group
                                my-1">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                                placeholder="Password" autocomplete="new-password" required>

                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form my-1">
                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <button type="submit" class="btn btn-warning float-start">Login</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <a href="{{ route('register') }}" class="btn btn-dark float-end">Register</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
