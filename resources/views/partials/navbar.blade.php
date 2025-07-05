<div my-2 >
    <form method="post" action="{{route('logout')}}">
        @csrf
        <button type="submit" id="logout">logout</button>
    </form>
</div>

<div mt-2>
    <p><a href={{route('user.index')}}>Data Pasien</a></p>
</div>



