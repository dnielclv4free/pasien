<h1>Register Page</h1>
<form method="POST" action="{{route('register.perform')}}">
    @csrf
    <input type="text" name="name" placeholder="Name"/>
    <input type="email" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password"/>
    <button type="submit">Submit</button>
</form>

