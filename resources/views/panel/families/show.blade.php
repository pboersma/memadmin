@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary">
                    <i class="fa-solid fa-house-user me-2 text-secondary"></i> Familie: {{ $family->name }}
                </h5>
            </div>

            <div class="card-body px-4">
                <p class="mb-2"><strong>Naam:</strong> {{ $family->name }}</p>
                <p class="mb-2"><strong>Totale Contributie:</strong>  € {{ number_format($totalContribution, 2, ',', '.') }}</p>
                <p class="mb-2"><strong>Aangemaakt op:</strong> {{ $family->created_at }}</p>
                <p class="mb-4"><strong>Bijgewerkt op:</strong> {{ $family->updated_at }}</p>

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
                    <p class="text-muted fst-italic">Geen leden gekoppeld aan deze familie.</p>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($family_members as $member)
                            <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <div>{{ $member->name }}</div>
                                    <div class="text-muted small">
                                        Contributie:
                                        @if($member->contribution)
                                            € {{ number_format($member->contribution->amount, 2, ',', '.') }}
                                        @else
                                            <span class="text-danger">Niet gevonden</span>
                                        @endif
                                    </div>
                                </div>

                                <a href="{{ route('family_members.show', $member->id) }}"
                                    class="btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="fa-solid fa-eye me-1"></i> Bekijk
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
