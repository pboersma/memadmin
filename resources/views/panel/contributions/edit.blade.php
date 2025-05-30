@extends('layouts.admin')

@section('content')
    <form action="{{ route('contributions.update', $contribution->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ $contribution->description }}" placeholder="Enter description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
