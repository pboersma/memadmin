@extends('layouts.authentication')

@section('content')
    <div class="alert alert-primary" role="alert">
        <strong>Gebruiker Beheerder:</strong><br>
        Email: <strong>beheerder@memadmin.com</strong>
        Password: <strong>beheerder!</strong>
    </div>
    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
@endsection
