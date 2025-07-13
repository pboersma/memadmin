@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Contributie Bewerken voor {{ session('fiscal_year')->year }}
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('contributions.update', $contribution->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label for="member_type" class="form-label fw-semibold">Lid type</label>
                        <input type="text" id="member_type" name="member_type"
                            value="{{ old('member_type', $contribution->member_type) }}"
                            class="form-control @error('member_type') is-invalid @enderror" placeholder="Test Lid">
                        @error('member_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('contributions.show', $contribution->id) }}"
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
