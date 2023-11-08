@extends('layouts.master')

@section('content')
    {{-- OLD LARAVEL WAY OF PRESENTING THE TABLE --}}
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <!-- Adjust the column sizes so they add up to 12 -->
                <div class="col-md-6">
                    <h2 class="text-light">Roles</h2>
                </div>
                <div class="col-md-6 text-right">
                    <!-- Use text-right to align the button to the right -->
                    <a href="{{ route('rolesCreate') }}" class="btn btn-success mt-1">
                        Create New Role</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>

                                <td>
                                    <div class="float-left mx-1">

                                        <a href="{{ route('rolesEdit', $role->id) }}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="float-left mx-1">

                                        <form action="{{ route('rolesDelete', $role->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger"> <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
            </div>
            </td>
            </tr>
            @endforeach

            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
