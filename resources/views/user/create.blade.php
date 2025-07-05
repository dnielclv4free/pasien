
<!DOCTYPE html>
<html>
<head>
    <title> User </title>
</head>
<body>
    <h1>Tambah User</h1>
    <div class="mt-4">
        <form method="POST" action="{{route('user.store')}}">
            @csrf

            <div>
                <label for="email">Email : </label><br>
                <input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                    required/>


            </div>
            <div>
                <label for="">Nama : </label><br>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required/>

            </div>
            <div>
                <label for="password">Password : </label><br>
                <input id="password" class="block mt-1 w-full" type="text" name="password" :value="old('password')"
                    required/>


            </div>
             @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <button>submit</button>
        </form>

    </div>
</body>
</html>
