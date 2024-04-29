<style>
    .table.dataTable th,
    table.dataTable td {
        color: white !important;
        align-content: left;
        text-align: left;
    }

    /* Button Style */
    /* Đổi màu chữ khi hover */
    button {
        width: auto !important;
        margin: 20px;
        /* float: left !important; */
    }

    .custom-btn {
        width: 130px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }

    .btn-1 {
        background: rgb(6, 14, 131);
        background: linear-gradient(0deg, rgba(6, 14, 131, 1) 0%, rgba(12, 25, 180, 1) 100%);
        border: none;
    }

    .btn-1:hover {
        background: rgb(0, 3, 255);
        background: linear-gradient(0deg, rgba(0, 3, 255, 1) 0%, rgba(2, 126, 251, 1) 100%);
    }
</style>
@extends('layouts.app')
@section('content')
    {{-- @include('slidebar.slide')
    <section id="wrapper">
        @include('header.index') --}}
        @livewire('btn-roles')
        <div class="card-body">
            {{-- {{ $dataTable->table(['id' => 'role-table']) }} --}}
            @livewire('role-datatable')
        </div>
    </section>
@endsection
