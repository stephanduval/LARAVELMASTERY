@extends('layouts.auth')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <h3>
                    Register for Task Tracking MIS
                </h3>
                <div class="card-header bg-secondary">
                    <h5 class="text-center text-light">Register</h5>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group my-1">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group my-1">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group my-1">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group my-1">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <button type="submit" class="btn btn-warning float-start">Register</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <a href="{{ route('register') }}" class="btn btn-dark float-end">Login</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
