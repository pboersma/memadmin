@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary fw-semibold">
                    <i class="fa-solid fa-plus me-2 text-success"></i> Nieuwe Contributie Aanmaken voor
                    {{ session('fiscal_year')->year }}
                </h5>
            </div>

            <div class="card-body px-4 py-4">
                <form action="{{ route('contributions.store') }}" method="POST" class="row g-3">
                    @csrf

                    <input type="hidden" name="fiscal_year_id" value="{{ session('fiscal_year')->id }}">
                    <input type="hidden" name="member_type_id" value="{{ $member_type->id }}">
                    <input type="hidden" name="member_type" value="{{ $current_discount->category }}">

                    <div class="col-md-6">
                        <label for="age" class="form-label fw-semibold">Leeftijd bij aanvang boekjaar</label>
                        <input type="text" id="age" name="age" class="form-control @error('age') is-invalid @enderror"
                            value="{{ old('age', $age) }}" readonly>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="member_type_label" class="form-label fw-semibold">Soort Lid</label>
                        <input type="text" id="member_type_label" class="form-control"
                            value="{{ $member_type->description }}" readonly>
                        @error('member_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($current_discount)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Korting ({{ $current_discount->category }})</label>
                            <input type="text" class="form-control" value="{{ $current_discount->discount }}%" readonly>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="alert alert-warning">
                                Geen korting gevonden voor deze leeftijd.
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <label for="amount" class="form-label fw-semibold">Bijdrage (€)</label>
                        <input type="text" id="amount" name="amount"
                            class="form-control @error('amount') is-invalid @enderror"
                            value="{{ old('amount', number_format(100 - ($current_discount->discount ?? 0), 2)) }}"
                            readonly>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('families.index') }}" class="btn btn-outline-secondary rounded-pill">
                            <i class="fa-solid fa-arrow-left me-1"></i> Terug
                        </a>
                        <button type="submit" class="btn btn-success rounded-pill">
                            <i class="fa-solid fa-check me-1"></i> Aanmaken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
