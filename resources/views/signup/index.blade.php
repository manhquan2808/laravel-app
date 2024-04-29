@extends('layouts.app')
@section('content')
    @include('slidebar.slide')

    {{-- <nav class="navbar navbar-expand-md"> --}}
    <style>
        select {
            display: block;
            width: 100%;
            min-height: calc(1.5em + (1rem + 2px));
            /* Ensure minimum height calculation */
            padding: 0.375rem 0.75rem;
            /* Consistent padding throughout */
            font-size: 1rem;
            /* Standard font size */
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            /* Standard border-radius */
            -webkit-appearance: none;
            /* Remove default styling for WebKit browsers */
            -moz-appearance: none;
            /* Remove default styling for Mozilla browsers */
            appearance: none;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            /* Smooth transitions for border and shadow */
        }
    </style>
    <form method="POST" action="">
        @csrf
        <section id="wrapper">
            @include('header.index')
            <div class="p-4">
                <section class="statistics mt-4">
                    <div class="row">
                        {{-- content --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <section class="vh-100 gradient-custom">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                            <div class="card-body p-5 text-center">
                                                <h2 class="fw-bold mb-2 text-uppercase">Tạo tài khoản</h2>
                                                {{-- <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="employee_id">Mã nhân viên</label>
                                                    <input type="text" id="employee_id" name="employee_id"
                                                        class="form-control form-control-lg" />
                                                </div> --}}
                                                {{-- <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="role_id">Chức vụ</label>
                                                    <input type="text" id="role_id" name="role_id"
                                                        class="form-control form-control-lg" />
                                                </div> --}}
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="first_name">Họ đệm</label>
                                                    <input type="text" id="first_name" name="first_name"
                                                        class="form-control form-control-lg" />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="last_name">Tên</label>
                                                    <input type="text" id="last_name" name="last_name"
                                                        class="form-control form-control-lg" />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="number">Số điện thoại</label>
                                                    <input type="text" id="number" name="number"
                                                        class="form-control form-control-lg" />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control form-control-lg" />
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="password">Mật khẩu</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control form-control-lg" />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="birth_date">Ngày sinh</label>
                                                    <input type="date" id="birth_date" name="birth_date"
                                                        class="form-control form-control-lg" />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="role_id">Chức vụ</label>
                                                    <select name="role_id" id="role_id">
                                                        <option value="" class="text-center">-- Chọn chức vụ --</option>
                                                        @foreach ($role as $item)
                                                            <option value="{{ $item->role_id }}">{{ $item->role_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="inventory_id">Kho</label>
                                                    <select name="inventory_id" id="inventory_id">
                                                        <option value="" class="text-center">-- Chọn kho --</option>
                                                        @foreach ($inventory as $data)
                                                            <option value="{{ $data->inventory_id }}">
                                                                {{ $data->inventory_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <br>
                                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Tạo tài
                                                    khoản</button>
                                                <br><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>

    </form>
    <script>
        // $(document).ready(function() {

        // });

        // $(document).on("change", "#role_id", function(e) {
        //     e.preventDefault();

        //     let role_id = $("#role_id").val();
        //     console.log(role_id)

        //     // $.ajax({
        //     //     url: "select_inventory.php",
        //     //     method: "post",
        //     //     dataType: "json",
        //     //     data: {
        //     //         role_id: role_id
        //     //     },
        //     //     // success: function(data) {
        //     //     //     lvl2_body = "";
        //     //     //     console.log(data)
        //     //     //     for (let i = 0; i < data.length; i++) {
        //     //     //         lvl2_body +=
        //     //     //             `<option value="${data[i].inventory_id}">${data[i].inventory_name}</option>`;
        //     //     //     }

        //     //     //     $("#lvl2").html(lvl2_body);
        //     //     // }
        //     // });
        // });
    </script>
@endsection
