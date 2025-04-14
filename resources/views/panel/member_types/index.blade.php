@extends('layouts.admin')

@section('content')
    <div>
        <a style="margin: 19px;" href="{{ route('member_types.create')}}" class="btn btn-primary">
            New Member Type
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
            @foreach ($member_types as $member_type)
                <tr>
                    <th scope="row">{{ $member_type->id }}</th>
                    <td>{{ $member_type->description }}</td>
                    <td>{{ $member_type->updated_at }}</td>
                    <td>{{ $member_type->created_at }}</td>
                    <td>
                        <form action="{{ route('member_types.destroy', $member_type->id) }}" method="POST">
                            <a href="{{ route('member_types.show', $member_type->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('member_types.edit', $member_type->id) }}" class="btn btn-primary">Edit</a>
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
