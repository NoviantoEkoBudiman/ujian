@extends('../index')
@section("content")

<form action="{{ route("user.update", $user->user_id) }}" method="post">
    @csrf
    @method("put")
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="user_nama" class="form-control @error('user_nama') is-invalid @enderror" value="{{ @$user->user_nama }}">
        @error('user_nama')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="user_username" class="form-control @error('user_username') is-invalid @enderror" value="{{ @$user->user_username }}">
        @error('user_username')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <select name="user_jabatan_id" class="form-control @error('user_jabatan_id') is-invalid @enderror">
            <option></option>
            <option value="1" {{ ($user->user_jabatan_id == 1) ? "selected" : null }}>Direktur</option>
            <option value="2" {{ ($user->user_jabatan_id == 2) ? "selected" : null }}>Team Leader</option>
            <option value="3" {{ ($user->user_jabatan_id == 3) ? "selected" : null }}>Pegawai</option>
            <option value="4" {{ ($user->user_jabatan_id == 4) ? "selected" : null }}>Admin</option>
        </select>
        @error('user_jabatan_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ @$user->password }}">
        @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection