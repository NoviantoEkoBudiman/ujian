@extends('index')
@section("content")
<a href="{{ route("penjelasan") }}" class="btn btn-md btn-primary mb-3">Penjelasan</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Task</th>
            <th>User</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_task as $key=>$list)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $list->task->task_nama }}</td>
                <td>{{ ($list->user) ? $list->user->username : null }}</td>
                <td>{{ ($list->list_task_status == 0) ? "Belum selesai" : "Sudah Selesai" }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection