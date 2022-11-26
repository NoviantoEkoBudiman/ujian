@extends('../index')
@section("content")

<form action="{{ route("user.store") }}" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="user_nama" class="form-control @error('user_nama') is-invalid @enderror">
        @error('user_nama')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror">
        @error('username')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <select name="user_jabatan_id" class="form-control @error('user_jabatan') is-invalid @enderror">
            <option></option>
            @foreach ($jabatan as $jbt)
                <option value="{{ $jbt->jabatan_id }}">{{ $jbt->jabatan_nama }}</option>          
            @endforeach
        </select>
        @error('user_jabatan_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection