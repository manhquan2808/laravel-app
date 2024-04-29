<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'number','email'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Phương thức để xác thực người dùng
    public function authenticatable($email, $password){
        return $this->where('email', $email)->where('password', $password)->first();
    }

    // Mô tả quan hệ: Một User có nhiều bài đăng (posts)
    public function posts()
    {
        // return $this->hasMany(Post::class);
    }

    // Phương thức để tạo mới một bài đăng cho user
    public function createPost($postData)
    {
        // Tạo mới một bài đăng và gán cho user hiện tại
        // return $this->posts()->create($postData);
    }
    
}
