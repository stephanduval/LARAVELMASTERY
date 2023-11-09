@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-light">Create Permission</h5>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('permissionsStore') }}" method="POST">
            @csrf
            <permissions-create></permissions-create>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </form>
    </div>
    </div>
@endsection
