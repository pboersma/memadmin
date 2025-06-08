@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        {{-- Add Button --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('families.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="fa-solid fa-plus me-2"></i> Nieuwe Familie
            </a>
        </div>

        {{-- Card --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-house-chimney-user me-2 text-secondary"></i> Families
                </h5>
            </div>

            <div class="card-body px-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Naam</th>
                                <th scope="col">Adres</th>
                                <th scope="col">Contributie</th>
                                <th scope="col">Laatst bijgewerkt</th>
                                <th scope="col">Aangemaakt op</th>
                                <th scope="col" class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($families as $family)
                                <tr>
                                    <td class="text-muted">{{ $family->id }}</td>
                                    <td>{{ $family->name }}</td>
                                    <td>{{ $family->address }}</td>
                                    <td>€ {{ number_format($family->total_contribution ?? 0, 2, ',', '.') }}</td>
                                    <td><span class="badge bg-light text-dark">{{ $family->updated_at }}</span>
                                    </td>
                                    <td><span class="badge bg-light text-dark">{{ $family->created_at }}</span>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('families.destroy', $family->id) }}" method="POST"
                                            class="d-inline-flex gap-1">
                                            <a href="{{ route('families.show', $family->id) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('families.edit', $family->id) }}"
                                                class="btn btn-sm btn-outline-primary rounded-pill">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                onclick="return confirm('Weet je zeker dat je deze familie wilt verwijderen?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Geen families gevonden.
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
