@extends('index')
@section("content")
<a href="{{ url('/') }}" class="btn btn-md btn-primary mb-3">Kembali</a>

<img style="width: 500px;height:432px;border: 1px solid black;" src="{{ asset('table_test.PNG') }}" class="w-100">
<br>
Berikut penjelasan table berdasarkan soal:
<ul>
    <li>1. One to One: Direncanakan satu jabatan hanya bisa diisi satu user</li>
    <li>2. One to Many: Direncanakan satu user bisa memiliki banyak inventaris</li>
    <li>3. Many to Many: Direncanakan banyak user bisa memiliki banyak task</li>
</ul>

@endsection