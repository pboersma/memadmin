@extends('layouts.admin')

@section('content')
    <form action="{{ route('contributions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Age">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
