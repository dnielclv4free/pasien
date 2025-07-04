@extends('components.layout')

@section('title', 'Login Page')

@section('content')
    <form method="POST" action="{{route('auth.register_p')}}">
        @csrf
        <input type="text" name="name" placeholder="Name"/>
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <button type="submit">Submit</button>
    </form>
@endsection
