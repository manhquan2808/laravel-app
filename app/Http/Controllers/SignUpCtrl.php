<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class SignUpCtrl extends Controller
{
    public function showSignUpForm()
    {
        // if (Session::get("role")==='AD') {
            // return redirect()->route('signup');  //If user is already logged in, then redirect to dashboard page.
            return view('signup.index', ['role' => Role::all()], ['inventory' => Inventory::all()]);

        // }

        // return view('signup.index');
        // return redirect('/');


    }
    public function signUp(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        // $validatedData = $request->validate([
        //     'role_id' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'number' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'birth_date' => 'required',
        //     'inventory_id' => 'required',
        // ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('employees')
            ->where('email', $email)
            ->first();
        // bool, underfined, null
        if ($user) {
            session()->flash('error', 'Đã có tài khoản');
            return redirect('/admin/signUp');
        }
        $pass = password_hash(base64_decode($password), PASSWORD_DEFAULT);
        try {
            // $role = Role::find($request->role_id);
            $role_id = $request->input("role_id");
            $role = DB::table('roles')->select('nickname')->where('role_id', $role_id)->first();
            $nickname = $role->nickname;
            
            $isTrue = DB::table('employees')->insert([
                "employee_id" => $nickname.rand(10000,99999),
                "role_id" => $role_id,
                "first_name" => $request->input("first_name"),
                "last_name" => $request->input("last_name"),
                "number" => $request->input("number"),
                "email" => $email,
                "password" => $pass,
                "birth_date" => $request->input("birth_date"),
                "inventory_id" => $request->input("inventory_id"),

            ]);
            if($isTrue){
                return redirect('/admin/dashboard');
            }
            
        } catch (\Throwable $throwable) {
            Log::error($throwable);
            session()->flash('error', 'Có lỗi');
            // return view('signup.index');
        }
        
    }

    // public function getRole(Request $request)
    // {

    //     $role_id = $request->input('role_id');
    //     $role = Role::where('role_id', $role_id)->get();

    //     return response()->json($role);


    // }
    // public function getInventory(Request $request)
    // {

    //     $inventory_id = $request->input('inventory_id');
    //     $inventory = Inventory::where('inventory_id', $inventory_id)->get();

    //     return response()->json($inventory);


    // }
}
