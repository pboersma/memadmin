@extends('layouts.admin')

@section('content')
    <form action="{{ route('family_members.update', $family_member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $family_member->name }}" placeholder="Enter name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
