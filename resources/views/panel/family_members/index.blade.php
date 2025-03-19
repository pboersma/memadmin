@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">UpdatedAt</th>
                <th scope="col">CreatedAt</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($family_members as $family_member)
            <tr>
                <th scope="row">{{ $family_member->id }}</th>
                <td>{{ $family_member->name }}</td>
                <td>{{ $family_member->updated_at }}</td>
                <td>{{ $family_member->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
