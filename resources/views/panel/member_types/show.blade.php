@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Member Type
        </div>
        <div class="card-body">
            <h5 class="card-title">Description: {{ $member_type->description }}</h5>
            <p class="card-text">Created at: {{ $member_type->created_at }}</p>
            <p class="card-text">Updated at: {{ $member_type->updated_at }}</p>
            <a href="{{ route('member_types.edit', $member_type->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('member_types.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
