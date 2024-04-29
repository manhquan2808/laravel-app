<?php
namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Livewire\Livewire;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use app\Http\Livewire\UserModal;    
use Livewire\WithPagination;

// use Yajra\DataTables\Datatables;

class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable // Định nghĩa truy vấn
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', function ($data) { // tạo nút action
            //     return '<button type="button" class="btn btn-sm btn-info view-user" value="' . $data->id . '" data-toggle="modal" data-target="#userModal">View</button>';
            // })
            ->addColumn('action', function ($user) {
            return '<button class="btn btn-sm btn-info" wire:click="openModal">View</button>';
                // return '<button type="button" class="btn btn-sm btn-info view-user" wire:click="openModal(' . $user->id . ')"  data-toggle="modal" data-target="#userModal">View</button>';
            })
            // ->rawColumns(['action'])
            ->setRowId('id');
    }

    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))->setRowId('id');
    // }

    public function query(User $model): QueryBuilder // Định nghĩa truy vấn
    {
        return $model->newQuery();
    }
    public function language() // chỉnh sửa các cài đặt ngôn ngữ của datatable
    {
        return [
            'language' => [
                'info' => 'Trang _PAGE_ trên _PAGES_',
                'infoEmpty' => 'Không có dữ liệu !!!',
                'infoFiltered' => '(Được lọc từ _MAX_ trang)',
                'lengthMenu' => 'Hiển thị _MENU_ mục',
                'zeroRecords' => 'Không có kết quả tương ứng',
                'search' => 'Tìm kiếm:',
                // 'paginate' => [
                //     'first' => 'Đầu',
                //     'last' => 'Cuối',
                //     'next' => 'Tiếp',
                //     'previous' => 'Trước'
                // ],
            ],
        ];
    }
    // protected function getColumns()
    // {
    //     return [
    //         'id',
    //         'name',
    //         'email',
    //         // 'created_at',
    //         [
    //             'title' => 'Actions',
    //             'data' => 'id',
    //             'name' => 'actions',
    //             'render' => 'function(data, type, full, meta) {
    //                 return `<button class="btn btn-sm btn-primary show-modal" data-id="${data}">Show Modal</button>`;
    //             }',
    //         ],
    //     ];
    // }
    protected function getCustomParameters() // trả về 1 mảng với các cài đặt ngôn ngữ được chỉ định ở trên
    {
        return
            [
                'language' => $this->language()['language'],
            ]

        ;
    }
    public function html(): HtmlBuilder // Xây dựng datatable
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters($this->getCustomParameters())
            ->buttons([
                //     Button::make('add'),
                //     Button::make('excel'),
                //     Button::make('csv'),
                //     Button::make('pdf'),
                //     Button::make('print'),
                //     Button::make('reset'),
                //     Button::make('reload'),
                Button::make('custom')->text('Show Modal')->action('function() {
                    var id = $(this).data("id");
                    $.ajax({
                        url: "' . route("users.show-modal", ["id" => ":id"]) . '",
                        type: "POST",
                        data: {
                            "_token": "' . csrf_token() . '",
                            "id": id
                        },
                        success: function(data) {
                            $("#userModalBody").html(data);
                            $("#userModal").modal("show");
                        }
                    });
                }')
            ]);
        // ->parameters([
        //     'dom' => 'Bfrtip',
        //     'buttons' => ['export', 'print', 'reset', 'reload'],
        // ]);
    }

    // protected function getColumns()
    // {
    //     return [
    //         'id',
    //         'name',
    //         'email',
    //         'created_at',
    //         [
    //             'title' => 'Actions',
    //             'data' => 'id',
    //             'name' => 'actions',
    //             'render' => 'function(data, type, full, meta) {
    //                 return `<button class="btn btn-sm btn-primary show-modal" data-id="${data}">Show Modal</button>`;
    //             }',
    //         ],
    //     ];
    // }

    public function getColumns(): array
    {
        return [
            Column::make('Mã nhân viên'),
            Column::make('Họ và tên'),
            Column::make('Email'),
            Column::make('SĐT'),
            Column::make('Ngày sinh'),
            Column::make('Kho'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
            // ->addColumn(['data' => 'id'], function ($data) {
            //     return '<button class="btn btn-sm btn-primary view-user" data-id="' . $data->id . '">View</button>';
            // })
            
        ];
    }




    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}