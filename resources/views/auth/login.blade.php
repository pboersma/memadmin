@extends('layouts.authentication')

@section('content')
    <div class="alert alert-primary shadow-sm rounded-3" role="alert">
        <strong>Gebruiker Beheerder</strong><br>
        Email: <strong>beheerder@memadmin.com</strong><br>
        Wachtwoord: <strong>beheerder!</strong>
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com"
                autofocus>
            <label for="floatingInput">E-mailadres</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Wachtwoord">
            <label for="floatingPassword">Wachtwoord</label>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button class="btn btn-primary w-100 py-2" type="submit">
            <i class="fa-solid fa-sign-in-alt me-1"></i> Inloggen
        </button>
    </form>
@endsection
