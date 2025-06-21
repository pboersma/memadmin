@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-tag me-2 text-secondary"></i> Contributie Staffel - {{ $discount->category }}
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <div class="mb-4">
                    <h6 class="fw-semibold text-dark mb-3">Kortingsoverzicht</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 px-0">
                            <strong>Omschrijving:</strong> {{ $discount->category }}
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <strong>Leeftijdsrange:</strong>
                            <span class="badge bg-light text-dark border">
                                {{ $discount->min_age }} - {{ $discount->max_age }} jaar
                            </span>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <strong>Korting:</strong>
                            <span class="badge bg-success-subtle text-success border">
                                {{ $discount->discount }}%
                            </span>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <strong>Aangemaakt op:</strong>
                            {{ $discount->created_at }}
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <strong>Bijgewerkt op:</strong>
                            {{ $discount->updated_at }}
                        </li>
                    </ul>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-outline-primary rounded-pill">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Bewerken
                    </a>
                    <a href="{{ route('discounts.index') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="fa-solid fa-arrow-left me-1"></i> Terug
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
