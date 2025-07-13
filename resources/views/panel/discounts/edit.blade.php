@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    Contributie Staffel Bewerken
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('discounts.update', $discount->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label for="category" class="form-label fw-semibold">Categorie</label>
                        <input type="text" id="category" name="category" value="{{ old('category', $discount->category) }}"
                            class="form-control @error('category') is-invalid @enderror" placeholder="Senior">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="min_age" class="form-label fw-semibold">Minimum Leeftijd</label>
                        <input type="text" id="min_age" name="min_age" value="{{ old('min_age', $discount->min_age) }}"
                            class="form-control @error('min_age') is-invalid @enderror" placeholder="4">
                        @error('min_age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="max_age" class="form-label fw-semibold">Maximum Leeftijd</label>
                        <input type="text" id="max_age" name="max_age" value="{{ old('max_age', $discount->max_age) }}"
                            class="form-control @error('max_age') is-invalid @enderror" placeholder="10">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="discount" class="form-label fw-semibold">Korting (%)</label>
                        <input type="text" id="discount" name="discount" value="{{ old('discount', $discount->discount) }}"
                            class="form-control @error('discount') is-invalid @enderror" placeholder="50">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('discounts.show', $discount->id) }}"
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
