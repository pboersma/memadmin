@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Familie Bewerken
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('families.update', $family->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">Naam</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $family->name) }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Bijv. Familie Jansen">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="address" class="form-label fw-semibold">Adres</label>
                        <input type="text" id="address" name="address" value="{{ old('address', $family->address) }}"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Bijv. Dorpsstraat 1, 1234 AB Utrecht">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('families.index') }}" class="btn btn-outline-secondary rounded-pill">
                            <i class="fa-solid fa-arrow-left me-1"></i> Terug
                        </a>
                        <button type="submit" class="btn btn-primary rounded-pill">
                            <i class="fa-solid fa-check me-1"></i> Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
