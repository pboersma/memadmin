@extends('app')

@section('layout')
    @include('partials.menu')

    <div class="container p-5">
        @yield('content')
    </div>
@endsection
