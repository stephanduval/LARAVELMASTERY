@extends('layouts.master')

@section('content')
    {{-- OLD LARAVEL WAY OF PRESENTING THE TABLE --}}
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <!-- Adjust the column sizes so they add up to 12 -->
                <div class="col-md-6">
                    <h2 class="text-light">Permissions</h2>
                </div>
                <div class="col-md-6 text-right">
                    @can('permissions-create')
                        <!-- Use text-right to align the button to the right -->
                        <a href="{{ route('permissionsCreate') }}" class="btn btn-success mt-1">
                            Create New Permission</a>
                    @endcan
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
                            @canany(['permissions-update,permissions-delete'])
                                <th>Actions</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{{ $permission->description }}</td>
                                @canany(['permissions-update', 'permissions-delete'])
                                    <td>
                                        @can('permissions-update')
                                            <div class="float-left mx-1">

                                                <a href="{{ route('permissionsEdit', $permission->id) }}" class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('permissions-delete')
                                            <div class="float-left mx-1">

                                                <form action="{{ route('permissionsDelete', $permission->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger"> <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
