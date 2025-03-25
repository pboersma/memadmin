@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Family Member
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $family_member->name }}</h5>
            <p class="card-text">Created at: {{ $family_member->created_at }}</p>
            <p class="card-text">Updated at: {{ $family_member->updated_at }}</p>
            <a href="{{ route('family_members.edit', $family_member->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('family_members.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
