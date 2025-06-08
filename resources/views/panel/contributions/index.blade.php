@extends('layouts.admin')

@section('content')
    <div>
        <a style="margin: 19px;" href="{{ route('contributions.create')}}" class="btn btn-primary">
            New Contribution
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">UpdatedAt</th>
                <th scope="col">CreatedAt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contributions as $contribution)
                <tr>
                    <th scope="row">{{ $contribution->id }}</th>
                    <td>{{ $contribution->member_type }}</td>
                    <td>{{ $contribution->updated_at }}</td>
                    <td>{{ $contribution->created_at }}</td>
                    <td>
                        <form action="{{ route('contributions.destroy', $contribution->id) }}" method="POST">
                            <a href="{{ route('contributions.show', $contribution->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('contributions.edit', $contribution->id) }}" class="btn btn-primary">Edit</a>
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
