<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/2.0.5/dataTables.bootstrap5.css"/>    --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/2.0.5/dataTables.bootstrap5.min.css"/>  --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" /> --}}
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">



    @livewireStyles

    <title>Admin</title>
</head>

<body>

    @yield('content')
{{-- jquery vs bootstrap --}}

    {{-- <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div> --}}

    {{-- Buộc nằm trên cùng --}}
    <script src="{{ asset('js/dashboard.js') }}"></script>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/2.0.5/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    @livewireScripts

    <script>
        
        const myModal = new bootstrap.Modal(document.getElementById("form"), {})
        window.addEventListener('show-form', event => {
            
            myModal.show();
        })
        window.addEventListener('hide-form', event => {
            myModal.hide();

        })

        const myModal = new bootstrap.Modal(document.getElementById("edit-form"), {})
        window.addEventListener('show-edit-form', event => {
            
            myModal.show();
        })
        window.addEventListener('hide-edit-form', event => {
            myModal.hide();

        })

        
    </script>
    {{-- <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/2.0.5/dataTables.bootstrap5.js"></script> --}}

    <!-- DataTables JS -->
    {{-- @stack('scripts') --}}
    {{-- <script>
        $(document).on("change", "#role_id", function(e) {
            e.preventDefault();

            let role_id = $("#role_id").val();
            console.log(role_id)
        })
        $(document).on("change", "#inventory_id", function(e) {
            e.preventDefault();

            let inventory_id = $("#inventory_id").val();
            console.log(inventory_id)
        })
    </script> --}}
    
</body>

</html>
