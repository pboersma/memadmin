@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div
                class="card-header bg-white border-bottom rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary">
                    <i class="fa-solid fa-users me-2 text-secondary"></i>
                    Familie Lid - {{ $family_member->name }}
                </h4>
                <a href="{{ route('families.show', $family_member->family_id) }}"
                    class="btn btn-outline-secondary btn-sm rounded-pill px-4">
                    <i class="fa-solid fa-arrow-left me-1"></i> Terug naar Familie
                </a>
            </div>

            <div class="card-body px-4 py-4">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold text-muted text-uppercase mb-3">
                            <i class="fa-solid fa-id-card me-2 text-primary"></i> Lid Gegevens
                        </h6>
                        <ul class="list-group list-group-flush rounded">
                            <li class="list-group-item border-0 px-0 py-2"><strong>Naam:</strong> {{ $family_member->name }}
                            </li>
                            <li class="list-group-item border-0 px-0 py-2"><strong>Geboortedatum:</strong>
                                {{ $family_member->birthdate }}</li>
                            <li class="list-group-item border-0 px-0 py-2"><strong>Lid Soort:</strong>
                                {{ $family_member->mem_type->description }}</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-semibold text-muted text-uppercase mb-0">
                                <i class="fa-solid fa-euro-sign me-2 text-primary"></i> Contributie voor
                                {{ session('fiscal_year')->year }}
                            </h6>
                            <i class="fa-solid fa-circle-info text-muted" data-bs-toggle="tooltip"
                                title="Vastgesteld bedrag per lid voor dit boekjaar."></i>
                        </div>

                        @if ($contribution)
                            <div class="card border-0 rounded-3 shadow-sm bg-light mb-2">
                                <div class="card-body py-3 px-4">
                                    <div class="mb-2 d-flex align-items-center">
                                        <i class="fa-regular fa-calendar me-2 text-secondary"></i>
                                        <span>Leeftijd: <strong>{{ $contribution->age }}</strong> jaar</span>
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <i class="fa-solid fa-user-tag me-2 text-secondary"></i>
                                        <span>Type: <strong>{{ $contribution->member_type }}</strong></span>
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <i class="fa-solid fa-percent me-2 text-secondary"></i>
                                        <span>Korting: <strong>{{ $contribution->discount->discount }}%</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-coins me-2 text-secondary"></i>
                                        <span>Bedrag:
                                            <span class="badge bg-primary fs-6 rounded-pill px-3">
                                                €{{ number_format($contribution->amount, 2) }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning d-flex align-items-center mt-2 rounded-3">
                                <i class="fa-solid fa-circle-exclamation me-2 text-warning"></i>
                                Geen contributie gevonden voor {{ session('fiscal_year')->year }}.
                            </div>

                            <a href="{{ route('contributions.create', ['birthdate' => $family_member->birthdate, 'member_type_id' => $family_member->mem_type->id]) }}"
                                class="btn btn-outline-primary w-100 mt-3 rounded-pill">
                                <i class="fa-solid fa-plus me-1"></i> Zet Contributie
                            </a>
                        @endif
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('family_members.edit', $family_member->id) }}"
                        class="btn btn-primary text-white rounded-pill px-4">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Bewerken
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
