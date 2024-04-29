<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    public $incrementing = false; // Khóa chính không phải tự tăng
    protected $keyType = 'string'; // Khóa chính là kiểu chuỗi

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'number',
        'email',
        'password',
        'birth_date',
        'create_date',
        'update_date',
        'inventory_id'
    ];

    protected $guarded = ['employee_id'];

    // Các phương thức quan hệ
    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'inventory_id'); // Khóa ngoại

    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id'); // Khóa ngoại

    }
}
