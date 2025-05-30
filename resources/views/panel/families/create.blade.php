@extends('layouts.admin')

@section('content')
    <form action="{{ route('families.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>

        <div class="mb-3">
            <label for="name">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
