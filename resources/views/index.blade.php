<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/sp-2.1.0/datatables.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: '{{ session("success") }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @elseif (session('error'))
            <script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: '{{ session("success") }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif
    
        <div class="container py-3">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">Sistem Informasi Kepegawaian</span>
                    </a>
                
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ url('/') }}">Dashboard</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('user.index') }}">User</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('inventaris.index') }}">Inventaris</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('jabatan.index') }}">Jabatan</a>
                        <a class="py-2 text-dark text-decoration-none" href="{{ route('task.index') }}">Task</a>
                    </nav>
                </div>
            </header>
        
            <main>
                @yield('content')
            </main>        
        </div>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
                
        {{-- Konfirmasi hapus data --}}
        <script>
            $("#deleteBtn").click(function(){
                return confirm("Anda yakin mau menghapus data ini?");
            });
        </script>
        {{-- Konfirmasi hapus data --}}

        {{-- Data table --}}
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/sp-2.1.0/datatables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        {{-- Data table --}}
    </body>
</html>
