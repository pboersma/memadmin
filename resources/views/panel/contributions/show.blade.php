@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Contributie
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <h6 class="fw-semibold mb-3">
                    <i class="fa-solid fa-tag me-2 text-primary"></i>
                    Lidtype: <span class="text-body">{{ $contribution->member_type }}</span>
                </h6>

                <p class="mb-2">
                    <i class="fa-solid fa-hourglass-half me-1 text-secondary"></i>
                    Leeftijd: {{ $contribution->age }} jaar
                </p>

                <p class="mb-2">
                    <i class="fa-solid fa-euro-sign me-1 text-secondary"></i>
                    Bedrag: <span class="fw-semibold text-success">€
                        {{ number_format($contribution->amount, 2, ',', '.') }}</span>
                </p>

                <p class="mb-2 text-muted">
                    <i class="fa-regular fa-calendar-plus me-1"></i>
                    Aangemaakt op: {{ $contribution->created_at }}
                </p>

                <p class="mb-4 text-muted">
                    <i class="fa-regular fa-calendar-check me-1"></i>
                    Bijgewerkt op: {{ $contribution->updated_at }}
                </p>

                <div class="d-flex gap-2">
                    <a href="{{ route('contributions.edit', $contribution->id) }}"
                        class="btn btn-outline-primary rounded-pill">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Bewerken
                    </a>
                    <a href="{{ route('contributions.index') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="fa-solid fa-arrow-left me-1"></i> Terug naar overzicht
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
