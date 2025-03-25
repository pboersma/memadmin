@extends('layouts.admin')

@section('content')
    <form action="{{ route('family_members.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="name">Birthdate</label>
            <input type="date" class="form-control" id="birtdate" name="birtdate" placeholder="Enter birtdate">
        </div>

        <div class="form-group">
            <label for="family">Family</label>
            <select class="form-control" id="family" name="family_id">
                <option value="">Select family</option>
                @foreach($families as $family)
                    <option value="{{ $family->id }}">{{ $family->name }}</option>
                @endforeach
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
