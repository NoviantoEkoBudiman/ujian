@extends('../index')
@section("content")

<form action="{{ route("add_task") }}" method="post">
    @csrf
    @method("post")
    <div class="mb-3">
      <label class="form-label">Tambah Task</label>
    </div>
    <div class="mb-3" hidden>
      <label class="form-label">Nama</label>
      <input type="text" name="list_user_id" class="form-control @error('user_nama') is-invalid @enderror" value="{{ $user->user_id }}" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">List Task</label>
        <select name="list_task_id" class="form-control">
            <option>- Pilih salah satu -</option>
            @foreach ($task as $tsk)
                <option value="{{ $tsk->task_id }}">{{ $tsk->task_nama }}</option>
            @endforeach
        </select>
        @error('list_task_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Task</th>
            <th>User</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_task as $key=>$list)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $list->task->task_nama }}</td>
                <td>{{ $list->user->user_nama }}</td>
                <td>{{ ($list->list_task_status == 0) ? "Belum selesai" : "Sudah Selesai" }}</td>
                <td>
                    <form action="{{ route("update_task", $list->list_id) }}" method="post">
                        @csrf
                        @method("put")
                        <input type="hidden" name="list_user_id" value="{{ $list->list_user_id }}">
                        <button onclick="return confirm('Anda yakin task ini sudah selesai?')" class="btn btn-md- btn-warning">Ubah Data</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection