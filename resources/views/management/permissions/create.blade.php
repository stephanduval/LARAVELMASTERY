@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-light">Create Permission</h5>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('rolesStore') }}" method="POST">
            @csrf
            <permissions-create></permissions-create>
        </form>
    </div>
    </div>
@endsection
