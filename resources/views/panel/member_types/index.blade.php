@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        {{-- Add Button --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('member_types.create') }}" class="btn btn-primary rounded-pill">
                <i class="fa-solid fa-plus me-2"></i> Nieuw Soort Lid
            </a>
        </div>

        {{-- Table Card --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-tags me-2 text-secondary"></i> Soorten Leden
                </h5>
            </div>

            <div class="card-body px-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th>#</th>
                                <th>Omschrijving</th>
                                <th>Bijgewerkt op</th>
                                <th>Aangemaakt op</th>
                                <th class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($member_types as $member_type)
                                <tr>
                                    <td class="text-muted">{{ $member_type->id }}</td>
                                    <td>{{ $member_type->description }}</td>
                                    <td><span
                                            class="badge bg-light text-dark">{{ $member_type->updated_at }}</span>
                                    </td>
                                    <td><span
                                            class="badge bg-light text-dark">{{ $member_type->created_at }}</span>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('member_types.destroy', $member_type->id) }}" method="POST"
                                            class="d-inline-flex gap-1">
                                            <a href="{{ route('member_types.show', $member_type->id) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('member_types.edit', $member_type->id) }}"
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
                                    <td colspan="5" class="text-center text-muted py-4">Geen soorten leden gevonden.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
