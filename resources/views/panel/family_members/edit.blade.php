@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-pen-to-square me-2 text-warning"></i> Familielid Bewerken
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('family_members.update', $family_member->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">Naam</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $family_member->name) }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Bijv. Jan Jansen">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="birthdate" class="form-label fw-semibold">Geboortedatum</label>
                        <input type="date" id="birthdate" name="birthdate"
                            value="{{ old('birthdate', $family_member->birthdate) }}"
                            class="form-control @error('birthdate') is-invalid @enderror">
                        @error('birthdate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="member_type" class="form-label fw-semibold">Lidtype (naam)</label>
                        <input type="text" id="member_type" name="member_type"
                            value="{{ old('member_type', $family_member->member_type) }}"
                            class="form-control @error('member_type') is-invalid @enderror" placeholder="Bijv. Jeugdlid">
                        @error('member_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="member_type_id" class="form-label fw-semibold">Lidtype ID</label>
                        <input type="number" id="member_type_id" name="member_type_id"
                            value="{{ old('member_type_id', $family_member->member_type_id) }}"
                            class="form-control @error('member_type_id') is-invalid @enderror" min="1">
                        @error('member_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="family_id" class="form-label fw-semibold">Familie ID</label>
                        <input type="number" id="family_id" name="family_id"
                            value="{{ old('family_id', $family_member->family_id) }}"
                            class="form-control @error('family_id') is-invalid @enderror" min="1">
                        @error('family_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('families.show', $family_member->family_id) }}"
                            class="btn btn-outline-secondary rounded-pill">
                            <i class="fa-solid fa-arrow-left me-1"></i> Terug
                        </a>
                        <button type="submit" class="btn btn-warning rounded-pill">
                            <i class="fa-solid fa-check me-1"></i> Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
