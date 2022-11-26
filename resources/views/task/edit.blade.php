@extends('../index')
@section("content")

<form action="{{ route("task.update", $task->task_id) }}" method="post">
    @csrf
    @method("put")
    <div class="mb-3">
      <label class="form-label">Nama task</label>
      <input type="text" name="task_nama" class="form-control @error('task_nama') is-invalid @enderror" value="{{ $task->task_nama }}">
        @error('task_nama')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi task</label>
        <textarea name="task_deskripsi" class="form-control">{{ $task->task_deskripsi }}</textarea>
        @error('task_deskripsi')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection