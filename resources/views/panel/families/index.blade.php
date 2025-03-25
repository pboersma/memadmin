@extends('layouts.admin')

@section('content')
    <div>
        <a style="margin: 19px;" href="{{ route('families.create')}}" class="btn btn-primary">New Family</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">UpdatedAt</th>
                <th scope="col">CreatedAt</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($families as $family)
            <tr>
                <th scope="row">{{ $family->id }}</th>
                <td>{{ $family->name }}</td>
                <td>{{ $family->address }}</td>
                <td>{{ $family->updated_at }}</td>
                <td>{{ $family->created_at }}</td>
                <td>
                    <form action="{{ route('families.destroy', $family->id) }}" method="POST">
                        <a href="{{ route('families.show', $family->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('families.edit', $family->id) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
