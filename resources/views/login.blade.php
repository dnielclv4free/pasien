<h1>LOGIN PAGE</h1>
<form method="POST" action="{{route('login.perform')}}">
    @csrf
    <input type="email" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password"/>
    <button type="submit">Submit</button>
</form>
<p>Tidak punya akun? </p><br>
<p><a href={{route('register.perform')}}>klik disini</a></p>

