@extends('layouts.app')

@section('content')
    <form action="{{ route('families.update', $family->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $family->name }}" placeholder="Enter name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
