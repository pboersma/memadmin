@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary">
                    Familie - {{ $family->name }}
                </h5>
            </div>

            <div class="card-body px-4">
                <p class="mb-2"><strong>Naam:</strong> {{ $family->name }}</p>
                <p class="mb-2"><strong>Adres:</strong> {{ $family->address }}</p>
                <p class="mb-2"><strong>Aangemaakt op:</strong> {{ $family->created_at }}</p>
                <p class="mb-2"><strong>Bijgewerkt op:</strong> {{ $family->updated_at }}</p>
                <hr>
                <p class="mb-4"><strong>Totale Contributie:</strong> € {{ number_format($totalContribution, 2, ',', '.') }}
                </p>



                <div class="d-flex gap-2">
                    <a href="{{ route('families.edit', $family->id) }}" class="btn btn-primary rounded-pill">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Bewerken
                    </a>
                    <a href="{{ route('families.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fa-solid fa-arrow-left me-1"></i> Terug
                    </a>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-light border-bottom rounded-top-4 px-4 py-3">
                <h6 class="mb-0 text-muted text-uppercase">
                    <i class="fa-solid fa-users me-2"></i> Familieleden
                </h6>
            </div>

            <div class="card-body px-4">
                @if (!$family_members)
                    <div class="text-center text-muted py-5">
                        <i class="fa-regular fa-user-slash fa-3x mb-3"></i>
                        <p class="mb-0 fs-6">Er zijn nog geen leden gekoppeld aan deze familie.</p>
                    </div>
                @else
                    <div class="row gy-3">
                        @foreach ($family_members as $member)
                            <div class="col-12">
                                <div
                                    class="border rounded-4 shadow-sm p-3 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 bg-white hover-shadow">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold text-body">{{ $member->name }}</h6>

                                        <ul class="list-unstyled small text-muted mb-2">
                                            <li>
                                                <i class="fa-regular fa-calendar me-1 text-secondary"></i>
                                                Geboren: {{ \Carbon\Carbon::parse($member->birthdate)->format('d-m-Y') }}
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-hourglass-half me-1 text-secondary"></i>
                                                Leeftijd: {{ \Carbon\Carbon::parse($member->birthdate)->age }} jaar
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-id-badge me-1 text-secondary"></i>
                                                Lidtype: <span
                                                    class="badge bg-light text-dark border">{{ $member->member_type }}</span>
                                            </li>
                                        </ul>

                                        <div class="text-muted">
                                            <i class="fa-solid fa-euro-sign me-1 text-secondary"></i>
                                            Contributie:
                                            @if($member->contribution)
                                                <span class="fw-semibold text-success">
                                                    € {{ number_format($member->contribution->amount, 2, ',', '.') }}
                                                </span>
                                            @else
                                                <span class="text-danger">Niet gevonden</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-2 mt-md-0">
                                        <a href="{{ route('family_members.show', $member->id) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            <i class="fa-solid fa-eye me-1"></i> Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>


        </div>
    </div>
@endsection
