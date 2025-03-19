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
        @foreach ($families as $family)
            <tr>
                <th scope="row">{{ $family->id }}</th>
                <td>{{ $family->name }}</td>
                <td>{{ $family->updated_at }}</td>
                <td>{{ $family->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
