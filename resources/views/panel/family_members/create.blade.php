@extends('layouts.admin')

@section('content')
    <form action="{{ route('family_members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>

        <div class="mb-3">
            <label for="name">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter birthdate">
        </div>

        <div class="mb-3">
            <label for="member_type">Member Type</label>
            <select class="form-control" id="member_type" name="member_type">
                <option value="">Select Member Type</option>
                <option value="son">Son</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="family">Family</label>
            <select class="form-control" id="family" name="family_id">
                <option value="">Select family</option>
                @foreach($families as $family)
                    <option value="{{ $family->id }}">{{ $family->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="member_type">Member Type</label>
            <select class="form-control" id="member_type" name="member_type_id">
                <option value="">Select Member Type</option>
                @foreach($member_types as $member_type)
                    <option value="{{ $member_type->id }}">{{ $member_type->description }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
