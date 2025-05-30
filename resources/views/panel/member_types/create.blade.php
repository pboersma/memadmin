@extends('layouts.admin')

@section('content')
    <form action="{{ route('member_types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
