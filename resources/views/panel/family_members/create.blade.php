@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Familielid Aanmaken
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('family_members.store') }}" method="POST" class="row g-3">
                    @csrf

                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">Naam</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" placeholder="Bijv. Jan Jansen">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="birthdate" class="form-label fw-semibold">Geboortedatum</label>
                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror"
                               id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
                        @error('birthdate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="member_type" class="form-label fw-semibold">Relatie tot gezin</label>
                        <select class="form-select @error('member_type') is-invalid @enderror" id="member_type" name="member_type">
                            <option value="">Selecteer relatie</option>
                            <option value="son" {{ old('member_type') == 'son' ? 'selected' : '' }}>Zoon</option>
                            <option value="daughter" {{ old('member_type') == 'daughter' ? 'selected' : '' }}>Dochter</option>
                            <option value="parent" {{ old('member_type') == 'parent' ? 'selected' : '' }}>Ouder</option>
                            <option value="other" {{ old('member_type') == 'other' ? 'selected' : '' }}>Anders</option>
                        </select>
                        @error('member_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="member_type_id" class="form-label fw-semibold">Lidtype</label>
                        <select class="form-select @error('member_type_id') is-invalid @enderror" id="member_type_id" name="member_type_id">
                            <option value="">Selecteer lidtype</option>
                            @foreach($member_types as $member_type)
                                <option value="{{ $member_type->id }}" {{ old('member_type_id') == $member_type->id ? 'selected' : '' }}>
                                    {{ $member_type->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('member_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="family_id" class="form-label fw-semibold">Familie</label>
                        <select class="form-select @error('family_id') is-invalid @enderror" id="family_id" name="family_id">
                            <option value="">Selecteer familie</option>
                            @foreach($families as $family)
                                <option value="{{ $family->id }}" {{ old('family_id') == $family->id ? 'selected' : '' }}>
                                    {{ $family->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('family_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('families.index') }}" class="btn btn-outline-secondary rounded-pill">
                            <i class="fa-solid fa-arrow-left me-1"></i> Terug
                        </a>
                        <button type="submit" class="btn btn-success rounded-pill px-4">
                            <i class="fa-solid fa-check me-1"></i> Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
