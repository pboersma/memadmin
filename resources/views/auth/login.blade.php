@extends('layouts.authentication')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com"
                        autofocus>
                    <label for="floatingInput">E-mailadres</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Wachtwoord">
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
        </div>
        <div class="col-12 col-sm-4">
            <div class="alert alert-primary shadow-sm rounded-3" role="alert">
                <strong>Gebruiker Beheerder</strong><br>
                Email: <strong>beheerder@memadmin.com</strong><br>
                Wachtwoord: <strong>beheerder!</strong>
                <hr>
                <strong>Gebruiker Secretaris</strong><br>
                Email: <strong>secretaris@memadmin.com</strong><br>
                Wachtwoord: <strong>secretaris!</strong>
                <hr>
                <strong>Gebruiker Penningmeester</strong><br>
                Email: <strong>penningmeester@memadmin.com</strong><br>
                Wachtwoord: <strong>penningmeester!</strong>
            </div>
        </div>
    </div>
@endsection
