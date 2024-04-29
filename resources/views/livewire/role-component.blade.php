<div class="modal fade" id="form" aria-hidden="true" aria-labelledby="form" tabindex="-1" wire:ignore.self>
    <form autocomplete="off" wire:submit.prevent="addRole" class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Thêm chức vụ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row has-validation" style="margin-bottom: 15px">
                    <label for="role_name" class="col-3">Tên chức vụ</label>
                    <div class="col-9">
                        <input type="text" id="role_name"
                            class="form-control @error('role_name') is-invalid @enderror"
                            wire:model.defer="state.role_name">

                        @error('role_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="form-group row has-validation" style="margin-bottom: 15px">
                    <label for="nickname" class="col-3">Viết tắt</label>
                    <div class="col-9">
                        <input type="text" id="nickname"
                            class="form-control @error('nickname') is-invalid @enderror"
                            wire:model.defer="state.nickname">
                        @error('nickname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Thêm chức vụ mới</button>
            </div>

        </div>
    </form>
</div>
