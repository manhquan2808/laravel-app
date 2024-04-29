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
                    <div class="card-body">
                        {{ $dataTable->table(['id' => 'employee-table']) }}
                       
                    </div>
                </div>
            </section>
        </div>
    </section>
    {{-- @livewire('user-modal') --}}
@endsection
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
                    console.log($('#employee-table')) // Đặt ID của bảng DataTables ở đây



                 

    //
    });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
{{-- <livewire:user-modal /> --}}
{{-- <livewire:users-data-table /> --}}
