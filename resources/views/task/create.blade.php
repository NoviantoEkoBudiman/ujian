@extends('../index')
@section("content")

<form action="{{ route("task.store") }}" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama task</label>
      <input type="text" name="task_nama" class="form-control @error('task_nama') is-invalid @enderror">
        @error('task_nama')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi task</label>
        <textarea name="task_deskripsi" class="form-control"></textarea>
        @error('task_deskripsi')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection