<?php

namespace App\DataTables;

use App\Models\Employee;
use App\Models\Inventory;
use App\Http\Controllers\EmployeesController;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class EmployeeDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'employee.action')
            ->setRowId('id');
    }

    public function query(Employee $model)
    {
        return $model->newQuery()
            ->join('inventory', 'inventory.inventory_id', '=', 'employees.inventory_id')
            ->select('employees.*', 'inventory.inventory_name');
    }
    // public function query(Employee $model)
    // {
    //     return $model->newQuery()
    //         ->with([
    //             'inventory' => function ($query) {
    //                 $query->select('inventory_id', 'inventory_name');
    //             }
    //         ])
    //         ->select('employees.*');
    // }


    public function html()
    {
        return $this->builder()
            ->setTableId('employee-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->parameters($this->getCustomParameters());
    }

    public function getCustomParameters()
    {
        return [
            'language' => [
                'info' => 'Trang _PAGE_ trên _PAGES_',
                'infoEmpty' => 'Không có dữ liệu !!!',
                'infoFiltered' => '(Được lọc từ _MAX_ trang)',
                'lengthMenu' => 'Hiển thị _MENU_ mục',
                'zeroRecords' => 'Không có kết quả tương ứng',
                'search' => 'Tìm kiếm:',
            ],
        ];
    }
    // public function querySelect()
    // {
    //     $query = Employee::select([
    //         'employees.employee_id',
    //         'employees.first_name',
    //         'employees.last_name',
    //         'employees.number',
    //         'employees.email',
    //         'employees.birth_date',
    //         'employees.create_date',
    //         'employees.update_date',
    //         'inventory.inventory_name'
    //     ]);

    //     return $this->applyScopes($query);
    // }
    protected function getColumns()
    {
        return [
            Column::make('employee_id')->title('Mã nhân viên')->addClass('text-center'),
            Column::make('first_name')->title('Họ đệm')->addClass('text-center'),
            Column::make('last_name')->title('Tên')->addClass('text-center'),
            Column::make('number')->title('SĐT')->addClass('text-center'),
            Column::make('email')->title('Email')->addClass('text-center'),
            Column::make('birth_date')->title('Ngày sinh')->addClass('text-center'),
            Column::make('create_date')->title('Ngày tạo')->addClass('text-center'),
            Column::make('update_date')->title('Ngày cập nhật')->addClass('text-center'),
            // Column::make('inventory_name')->title('Kho')->addClass('text-center'),
            Column::make('inventory_name')->title('Kho')->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'Employee_' . date('YmdHis');
    }
}