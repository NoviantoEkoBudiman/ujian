@extends('../index')
@section("content")
<a href="{{ route("user.create") }}" class="btn btn-md btn-primary mb-3">Tambah User</a>

<table class="table" id="myTable">    
    <thead>
        <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->user_nama }}</td>
                <td>{{ $user->user_username }}</td>
                <td>{{ $user->user_jabatan_id }}</td>
                <td>
                    <form action="{{ route('user.destroy', $user->user_id ) }}" method="POST">
                        <a href="{{ route("user.edit", $user->user_id) }}" class="btn btn-md btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button id="deleteBtn" class="btn btn-md btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>            
        @endforeach
    </tbody>
</table>

@endsection