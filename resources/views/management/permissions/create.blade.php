@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-light">Create New Permission</h5>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('permissionsStore') }}" method="POST">
            @csrf
            <permissions-create></permissions-create>
            <div class="btn-container float-right">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('permissionsIndex') }}" class="btn btn-danger ml-2">Cancel</a>
            </div>
        </form>
    </div>
@endsection
