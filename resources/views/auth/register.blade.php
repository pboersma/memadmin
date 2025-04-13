@extends('layouts.authentication')

@section('content')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <h2 class="h3 mb-3 fw-normal">Please register</h2>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" name="name" placeholder="John Doe" required>
            <label for="floatingName">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password_confirmation" placeholder="Confirm" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
@endsection
