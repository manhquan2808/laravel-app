<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\Employee;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// use phpseclib3\Crypt\RSA;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class LoginController extends Controller
{
    //get - read
    public function showLoginForm()
    {

        if (Session::get("role") === "AD") {
            return Redirect::route('admin.dashboard'); //If employee is already logged in, then redirect to dashboard page.
        }
        return view('auth.login');
        // return redirect()->route('dashboard');

    }
    //post http body {data} -> tạo mới dữ liệu
    //put http body {data} -> cập nhật lại
    // CRUD
    public function login(Request $request)
    {

        // $credential = $request->only(["email","password"]);
        $email = $request->input('email');
        $password = $request->input('password');
        // Truy vấn kiểm tra dữ liệu -- post model
        $employee = Employee::where('email', $email)->first();
        // var_dump($employee->$id);

        // Kiểm tra tồn tại của employee và so sánh Password
        if ($employee && Hash::check(base64_decode($password), $employee->password)) { // THIẾU PHẦN GIẢI MÃ (verify_password) sau khi làm mã hóa 
            // Đăng nhập thành công thì
            // $id = [
            //     'employee_id' => $employee->employee_id,
            //     'exp' => time() + 3600, // Thời gian hết hạn của token, ví dụ 1 giờ từ thời điểm hiện tại
            // ];
            // $key = $_ENV['KEY_TOKEN_JWT'];
            // $jwt = JWT::encode($id, $key, 'HS256');
            $role_id = Employee::find($employee->employee_id, "role_id")->role_id;
            // echo $role_id;
            // echo $token ."<br>";
            $nickNameSession = Role::find($role_id, "nickname")->nickname;
            Session::put("role", $nickNameSession);


            // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

            // Chuyển hướng đến trang dashboard
            if ($nickNameSession === "AD") {
                return redirect()->intended("admin/dashboard");

            } elseif ($nickNameSession === "NV") {
                return redirect()->intended("employee/dashboard");
            }
        } else {
            // Đăng nhập thất bại 
            session()->flash('error', 'Sai thông tin đăng nhập. Vui lòng thử lại!');
            return back()->withInput()->withErrors(['email' => 'Thông tin đăng nhập không đúng']);
            // return redirect()->intended("/test")->with('error', 'Đăng nhập thất bại');
        }
        // if(!auth()->attempt($credential)){
        //     return back()->withInput()->withErrors(["error" => "Thông tin sai!!!"]);
        // }
        // return  redirect("/dashboard")->with(["success"=>""]);
    }
    public function LogOut(Request $request)
    {
        // Auth::logout();
        Session::forget("role");
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công !!!');
    }
    protected function redirectTo()
    {
        if (Auth::check()) {
            return route('dashboard.index'); // hoặc route('home')
        }
    }
}
