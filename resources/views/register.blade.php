@extends('components.layout')

@section('title', 'Login Page')

@section('content')
    <form method="POST" action="{{route('auth.register-p')}}">
        @csrf
        <input type="name" placeholder="name"/>
        <input type="email" placeholder="Email"/>
        <input type="password" placeholder="Password"/>
        <button type="submit">Submit</button>
    </form>
@endsection
