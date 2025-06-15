@extends('layouts.admin')

@section('content')
    <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Category</label>
            <input type="text" class="form-control" id="category" name="category"
                value="{{ $discount->category }}" placeholder="Enter category">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
