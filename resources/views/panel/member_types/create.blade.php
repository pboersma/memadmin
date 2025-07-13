@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Soort Lid Aanmaken
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('member_types.store') }}" method="POST" class="row g-3">
                    @csrf

                    <div class="col-md-12">
                        <label for="description" class="form-label fw-semibold">Omschrijving</label>
                        <input type="text" id="description" name="description"
                            class="form-control @error('description') is-invalid @enderror" placeholder="Test Lid">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('member_types.index') }}" class="btn btn-outline-secondary rounded-pill">
                            <i class="fa-solid fa-arrow-left me-1"></i> Terug
                        </a>
                        <button type="submit" class="btn btn-warning rounded-pill">
                            <i class="fa-solid fa-check me-1"></i> Aanmaken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
