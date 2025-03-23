@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Family
        </div>
        <div class="card-body">
            <h5 class="card-title
                ">Name: {{ $family->name }}</h5>
            <p class="card-text">Created at: {{ $family->created_at }}</p>
            <p class="card-text">Updated at: {{ $family->updated_at }}</p>
            <a href="{{ route('families.edit', $family->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('families.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
