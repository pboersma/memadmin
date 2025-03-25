@extends('layouts.admin')

@section('content')
    <form action="{{ route('member_types.update', $member_type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ $member_type->description }}" placeholder="Enter description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
