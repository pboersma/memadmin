@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('discounts.create') }}" class="btn btn-primary rounded-pill">
                <i class="fa-solid fa-plus me-2"></i> Nieuw Soort Lid
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-percent me-2 text-secondary"></i> Contributie Staffels
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <div class="table-responsive">
                    <table class="table align-middle border border-1">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th>#</th>
                                <th>Omschrijving</th>
                                <th>Leeftijd</th>
                                <th>Korting (%)</th>
                                <th>Bijgewerkt op</th>
                                <th>Aangemaakt op</th>
                                <th class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discounts as $discount)
                                <tr>
                                    <td class="text-muted">{{ $discount->id }}</td>
                                    <td class="fw-semibold">{{ $discount->category }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ $discount->min_age }} – {{ $discount->max_age }} jaar
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success border">
                                            {{ $discount->discount }}%
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ $discount->updated_at }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ $discount->created_at }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                                            class="d-inline-flex gap-1">
                                            <a href="{{ route('discounts.show', $discount->id) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('discounts.edit', $discount->id) }}"
                                                class="btn btn-sm btn-outline-primary rounded-pill">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="fa-regular fa-face-frown fa-lg mb-2"></i><br>
                                        Geen soorten leden gevonden.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
