<!DOCTYPE html>
<html>
<head>
    <title> User </title>
</head>
<body>
    @include('partials.navbar')
    <h1>Edit User</h1>
    <div class="mt-4">
        <form method="POST" action="{{route('user.update',$user)}}">
            @csrf
            @method('PUT')
            <div>
                <label for="email">Email : </label><br>
                <input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$user->email}}"
                    required/>
            </div>
            <div>
                <label for="">Nama  : </label><br>
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}"
                    required/>
            </div>
            <div>
                <label for="password">Password (kosongkan jika tidak ingin diubah) : </label><br>
                <input id="password" class="block mt-1 w-full" type="text" name="password" value=""
                    />
            </div>
            <div id="role{{$user->id}}">
                <label for="role_id">Role </label><br>
                <select name="role_id" id="role_id" class="form-control">
                    <option value="">Pilih Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->role_name}}</option>
                    @endforeach
                </select>
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
    @include('user.partials.delete')

</body>
</html>
