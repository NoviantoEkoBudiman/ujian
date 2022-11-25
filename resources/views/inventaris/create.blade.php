@extends('../index')
@section("content")

<form action="{{ route("inventaris.store") }}" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Barang</label>
      <input type="text" name="inventaris_nama_barang" class="form-control @error('inventaris_nama_barang') is-invalid @enderror">
        @error('inventaris_nama_barang')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Pengguna</label>
        <select name="inventaris_user_id" class="form-control">
            <option></option>
            @foreach ($users as $user)
                <option value="{{ $user->user_id }}">{{ $user->user_nama }}</option>
            @endforeach
        </select>
        @error('inventaris_user_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection