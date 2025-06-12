@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('contributions.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="fa-solid fa-plus me-2"></i> Nieuwe Contributie
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-hand-holding-dollar me-2 text-secondary"></i> Contributies
                </h5>
            </div>

            <div class="card-body px-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Beschrijving</th>
                                <th scope="col">Leeftijd</th>
                                <th scope="col">Bedrag</th>
                                <th scope="col">Laatst bijgewerkt</th>
                                <th scope="col">Aangemaakt op</th>
                                <th scope="col" class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contributions as $contribution)
                                <tr>
                                    <td class="text-muted">{{ $contribution->id }}</td>
                                    <td>{{ $contribution->member_type }}</td>
                                    <td>{{ $contribution->age }}</td>
                                    <td>&euro; {{ number_format($contribution->amount, 2, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $contribution->updated_at }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $contribution->created_at }}</span>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('contributions.destroy', $contribution->id) }}" method="POST"
                                            class="d-inline-flex gap-1">
                                            <a href="{{ route('contributions.show', $contribution->id) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('contributions.edit', $contribution->id) }}"
                                                class="btn btn-sm btn-outline-primary rounded-pill">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                onclick="return confirm('Weet je zeker dat je deze contributie wilt verwijderen?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Geen contributies gevonden.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
