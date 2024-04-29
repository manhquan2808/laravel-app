<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\EmployeeDataTable;



class EmployeesController extends Controller
{
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employees.index');
    }

    // public function getEmployee(){
    //     $query = Employee::query()
    //         ->join('inventory', 'inventory.inventory_id', '=', 'employee.inventory_id')
    //         ->select(['employee.*','inventory.inventory_name']);
        
    //     return datatables()->of($query)->toJson();
    // }
}
