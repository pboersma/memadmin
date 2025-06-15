@extends('layouts.admin')

@section('content')
    <form action="{{ route('discounts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Enter category">
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
