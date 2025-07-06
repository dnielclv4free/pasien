
<div>
  <h1>Data Pasien</h1>
    @include ('partials.navbar')

    <h2>Ini Dashboard</h2>


    <table border="1" class="table-auto w-full">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role?->role_name}}</td>
                </tr>
        </tbody>
    </table>

</div>
