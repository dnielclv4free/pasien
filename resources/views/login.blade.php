@extends('components.layout')

@section('title', 'Login Page')

@section('content')
    <form method="POST" action="{{route('auth.login_p')}}">
        @csrf
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <button type="submit">Submit</button>
    </form>
    <p>Tidak punya akun? </p><br>
    <p><a href={{route('sect.register')}}>klik disini</a></p>
@endsection
