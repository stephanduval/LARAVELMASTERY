@extends('layouts.master')

@section('content')
    <h1>Create New Department</h1>
    <form action="{{ route('departmentsStore') }}" method="POST">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="director_id">Director</label>
                    <select name="director_id" class="form-control">
                        <option value="" selected>Select a person</option>
                        <option value="1">IT Director</option>
                        <option value="2">HR Director</option>
                    </select>
                </div>


            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
