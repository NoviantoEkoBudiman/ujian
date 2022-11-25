@extends('../index')
@section("content")
<a href="{{ route("inventaris.create") }}" class="btn btn-md btn-primary mb-3">Tambah Inventaris</a>

<table class="table" id="myTable">
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Pemakai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inventaris as $key=>$inven)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $inven->inventaris_nama_barang }}</td>
                <td>{{ $inven->inventaris_user_id }}</td>
                <td>
                    <form action="{{ route('inventaris.destroy', $inven->inventaris_id ) }}" method="POST">
                        <a href="{{ route("inventaris.edit", $inven->inventaris_id) }}" class="btn btn-md btn-warning">Edit</a>
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