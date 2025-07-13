@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        @php
            $roles = array_map(fn($r) => $r->name, session('roles') ?? []);
        @endphp

        @if(array_intersect(['secretaris', 'beheerder'], $roles))
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('family_members.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                    <i class="fa-solid fa-plus me-2"></i> Nieuw Familielid
                </a>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Familieleden
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <div class="table-responsive">
                    <table class="table align-middle border border-1">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th>#</th>
                                <th>Naam</th>
                                <th>Familie</th>
                                <th>Relatie tot Familie</th>
                                <th>Bijgewerkt op</th>
                                <th>Aangemaakt op</th>
                                <th class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($family_members as $family_member)
                                <tr>
                                    <td class="text-muted">{{ $family_member->id }}</td>
                                    <td class="fw-semibold">{{ $family_member->name }}</td>
                                    <td>{{ $family_member->family_name }}</td>
                                    <td>{{ $family_member->member_type }}</td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ $family_member->updated_at }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ $family_member->created_at }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('family_members.destroy', $family_member->id) }}" method="POST"
                                            class="d-inline-flex gap-1">
                                            <a href="{{ route('family_members.show', $family_member->id) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @if(array_intersect(['secretaris', 'beheerder'], $roles))
                                                <a href="{{ route('family_members.edit', $family_member->id) }}"
                                                    class="btn btn-sm btn-outline-primary rounded-pill">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                    onclick="return confirm('Weet je zeker dat je dit familielid wilt verwijderen?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fa-regular fa-face-frown fa-lg mb-2"></i><br>
                                        Geen familieleden gevonden.
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
