@extends('layouts.main')

@section('title', 'Task | Main')

@section('content')

        @guest
            <h1 style="text-align: center">WELCOME TO MY PAGE</h1>
        @endguest
        @auth
            <h1 style="text-align: center">WELCOME {{auth()->user()->name}} JAN</h1>
        @endauth
@endsection
