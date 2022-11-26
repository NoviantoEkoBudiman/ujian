@extends('../index')
@section("content")

<form action="{{ route("jabatan.store") }}" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Jabatan</label>
      <input type="text" name="jabatan_nama" class="form-control @error('jabatan_nama') is-invalid @enderror">
        @error('jabatan_nama')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi Jabatan</label>
        <textarea name="jabatan_deskripsi" class="form-control"></textarea>
        @error('jabatan_deskripsi')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection