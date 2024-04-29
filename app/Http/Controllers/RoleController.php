<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable;
use App\DataTables\RoleDataTable;
use App\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    //
    public function showRole(RoleDataTable $dataTable){
        return $dataTable->render('role.index');
    }

}
