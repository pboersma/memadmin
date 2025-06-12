@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Contributie
        </div>
        <div class="card-body">
            <h5 class="card-title">Beschrijving: {{ $contribution->member_type }}</h5>
            <p class="card-text">Aangemaakt op: {{ $contribution->created_at }}</p>
            <p class="card-text">Geupdate op: {{ $contribution->updated_at }}</p>
            <a href="{{ route('contributions.edit', $contribution->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('contributions.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
