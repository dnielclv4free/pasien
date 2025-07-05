<div my-2 >
    <form method="post" action="{{route('auth.logout')}}">
        @csrf
        <button type="submit" id="logout">logout</button>
    </form>
</div>

