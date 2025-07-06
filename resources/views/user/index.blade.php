<!DOCTYPE html>
<html>
<head>
    <title> User </title>
</head>
<body>
    <h1>Data User</h1>
    @include('partials.navbar')
    <div>
        <a href="{{route('user.create')}}">
        <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">Tambah</button>
        </a>
    </div>
    @include("user.partials.search")
    <table border="1" class="table-auto w-full">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role?->role_name}}</td>
                <td> <a href = "{{route('user.edit',['user'=>$user->id])}}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4"">
        {{$users->links()}}
    </div>

</body>
</html>
