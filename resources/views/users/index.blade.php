<style>
    .table.dataTable th,
    table.dataTable td {
        color: white !important;
        align-content: left;
        text-align: left;
    }
</style>
@extends('layouts.app')
@section('content')
    @include('slidebar.slide')
    <section id="wrapper">
        @include('header.index')
        <div class="p-4">
            <section class="statistics mt-4">
                <div class="row">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h1>DANH SÁCH NHÂN VIÊN</h1>

                        </div>
                    </div>
                    {{-- content --}}
                    {{-- <div class="card-header">Quản lý nhân viên</div> --}}
                    <div class="card-body">
                        {{ $dataTable->table(['id' => 'employees-table']) }}
                    </div>
                </div>
            </section>
            {{-- @include('users.modal') --}}
        </div>
    </section>
@livewire('user-modal')

@endsection
@push('scripts')
<script>
    document.addEventListener('livewire:load', function() {
        console.log($('#employees-table')) // Đặt ID của bảng DataTables ở đây

     
        

        // 
    });
</script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
{{-- <livewire:user-modal /> --}}
{{-- <livewire:users-data-table /> --}}
@livewire('user-modal') 
























{{-- // $(document).ready(function() {
        //     function viewAction(id) {
        //         console.log(id)
        //     }
        //     $('#users-table').on('click', '.view-user', function() {
        //         console.log($(this).val())
        //         var userId = $(this).val();
        //         $.ajax({
        //             url: '/users/' + userId +
        //                 '/show-modal', // Thay đổi url tương ứng với route của bạn để lấy thông tin người dùng
        //             method: 'GET',
        //             success: function(response) {
        //                 let html = `<p><strong>id:</strong> ${response.id}</p>
    //         <!-- Your user information here -->
    //         <p><strong>Name:</strong> ${response.name}</p>
    //         <p><strong>Email:</strong> ${response.email}</p>`
        //                 $('#userInfoBody').html(html);
        //                 $('#userInfoModal').modal('show');
        //                 console.log(response)
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     });
        // }); --}}


{{-- <div class="btn-group" role="group" aria-label="Filter by Role">
                                <button type="button" class="btn btn-secondary role-filter" data-role="admin">Admin</button>
                                <button type="button" class="btn btn-secondary role-filter" data-role="user">User</button>
                                <button type="button" class="btn btn-secondary role-filter"
                                    data-role="editor">Editor</button>
                                <button type="button" class="btn btn-secondary role-filter"
                                    data-role="manager">Manager</button>
                                <button type="button" class="btn btn-secondary role-filter"
                                    data-role="guest">Guest</button>
                                <button type="button" class="btn btn-secondary role-filter"
                                    data-role="other">Other</button>
                                <button type="button" class="btn btn-secondary role-filter" data-role="">Clear
                                    Filter</button>
                            </div> --}}
{{-- <script>
                function viewAction(id) {
                    // Ở đây bạn có thể thực hiện các hành động tương ứng với ID đã truyền
                    alert('View action for ID: ' + id);
                }
            </script> --}}
{{-- <script>
        $(document).ready(function() {
            $('#users-table').on('click', '.view-user', function() {
                var userId = $(this).data('id');

                $.ajax({
                    url: "{{ route('users.show-modal', ':id') }}".replace(':id', userId),
                    method: 'GET',
                    success: function(response) {
                        $('#userModalBody').html(response);
                        $('#userModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script> --}}
