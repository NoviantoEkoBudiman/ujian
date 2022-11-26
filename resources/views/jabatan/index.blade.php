@extends('../index')
@section("content")
<a href="{{ route("jabatan.create") }}" class="btn btn-md btn-primary mb-3">Tambah Jabatan</a>

<table class="table" id="myTable">    
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jabatan as $key=>$jabat)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $jabat->jabatan_nama }}</td>
                <td>{{ $jabat->jabatan_deskripsi }}</td>
                <td>
                    <form action="{{ route('jabatan.destroy', $jabat->jabatan_id ) }}" method="POST">
                        <a href="{{ route("jabatan.edit", $jabat->jabatan_id) }}" class="btn btn-md btn-warning">Edit</a>
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