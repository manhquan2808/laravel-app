<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <input wire:model.live.debounce.300ms="search" type="text"
                                class="bg-blue-50 border border-primary rounded-pill w-20 p-3 h-auto"
                                placeholder="Tìm kiếm">
                            <x-bi-search style="color: aliceblue" />

                        </div>
                    </div>
                </div>
                {{-- <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input wire:model.live.debounce.300ms="search" type="search" id="form1" class="form-control"
                            placeholder="Tìm kiếm" style="margin-bottom: 15px" />
                    </div>
                </div> --}}
                <div class="overflow-x-auto d-flex justify-content-center">
                    <table class="table table-striped table-dark w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr class="text-light">
                                <th wire:click="doSort('role_id')" class="px-4 py-3">
                                    <x-datatable-items :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="ID" />
                                </th>
                                <th wire:click="doSort('role_name')" class="px-4 py-3">
                                    <x-datatable-items :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Tên chức vụ" />
                                </th>
                                <th wire:click="doSort('nickname')" class="px-4 py-3">
                                    <x-datatable-items :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Viết tắt" />
                                </th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="border-b dark-border-gray-700 text-light text-center">
                                    <td class="px-4 py-3">{{ $role->role_id }}</td>
                                    <td class="px-4 py-3">{{ $role->role_name }}</td>
                                    <td class="px-4 py-3">{{ $role->nickname }}</td>
                                    {{-- <td @click="$dispatch('edit-mode', {id:{{roles->role_id}}})" class="px-4 py-3"><button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit-form">Chỉnh sửa</button></td> --}}
                                    <td class="px-4 py-3">
                                        <button class="btn btn-primary"
                                            wire:click="$emit('editRole', {{ $roles->role_id }})">Chỉnh sửa</button>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    <div class="flex">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="text-white">Số trang</label>
                            <select wire:model.live="perPage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                    {{-- {{ $roles->links() }}  lỗi giao diện --}}
                </div>
            </div>
        </div>
    </section>
</div>
@livewire('role-edit')
