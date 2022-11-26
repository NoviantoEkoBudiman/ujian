@extends('../index')
@section("content")
<a href="{{ route("task.create") }}" class="btn btn-md btn-primary mb-3">Tambah Task</a>

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
        @foreach ($tasks as $key=>$task)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $task->task_nama }}</td>
                <td>{{ $task->task_deskripsi }}</td>
                <td>
                    <form action="{{ route('task.destroy', $task->task_id ) }}" method="POST">
                        <a href="{{ route("task.edit", $task->task_id) }}" class="btn btn-md btn-warning">Edit</a>
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