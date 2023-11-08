@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-light">Update Role</h5>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('rolesUpdate', $role->id) }}" method="POST">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id=""
                            value="{{ $role->name }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                        <input type="text" class="form-control" name="display_name" id=""
                            value="{{ $role->diusplay_name }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id=""
                            value="{{ $role->description }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
