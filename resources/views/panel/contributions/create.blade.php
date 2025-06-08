@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom rounded-top-4 px-4 py-3">
                <h5 class="mb-0 text-primary">
                    <i class="fa-solid fa-euro-sign me-2 text-secondary"></i> Nieuwe Contributie aanmaken voor {{ session() }}
                </h5>
            </div>

            <div class="card-body px-4">
                <form action="{{ route('contributions.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="fiscal_year_id" value="{{ session('fiscal_year')->id }}">
                    <input type="hidden" name="member_type_id" value="{{ $member_type->id }}">

                    <div class="mb-3">
                        <label class="form-label">Leeftijd bij aanvang boekjaar</label>
                        <input type="text" name="age" class="form-control" value="{{ $age }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Soort Lid</label>
                        <input type="text" class="form-control" value="{{ $member_type->description }}" readonly>
                    </div>

                    @if ($current_discount)
                        <div class="mb-3">
                            <label class="form-label">Korting ({{ $current_discount->category }})</label>
                            <input type="text" class="form-control" value="{{ $current_discount->discount }}%" readonly>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Geen korting gevonden voor deze leeftijd.
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Bijdrage</label>
                        <input type="text" name="amount" class="form-control"
                            value="{{ number_format(100 - $current_discount->discount ?? 0, 2) }}" readonly>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fa-solid fa-plus me-1"></i> Aanmaken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
