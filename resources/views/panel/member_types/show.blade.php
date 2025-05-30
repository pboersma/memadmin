@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary">
                    <i class="fa-solid fa-tag me-2 text-secondary"></i> Soort Lid: {{ $member_type->description }}
                </h5>
            </div>

            <div class="card-body px-4">
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item border-0 px-0"><strong>Omschrijving:</strong> {{ $member_type->description }}
                    </li>
                    <li class="list-group-item border-0 px-0"><strong>Aangemaakt op:</strong>
                        {{ $member_type->created_at }}</li>
                    <li class="list-group-item border-0 px-0"><strong>Bijgewerkt op:</strong>
                        {{ $member_type->updated_at }}</li>
                </ul>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('member_types.edit', $member_type->id) }}" class="btn btn-primary rounded-pill">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Bewerken
                    </a>
                    <a href="{{ route('member_types.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fa-solid fa-arrow-left me-1"></i> Terug
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
