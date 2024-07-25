<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Admins</h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" wire:click="add">
                        Add
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$admin->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$admin->email}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            wire:click="edit({{$admin->id}})"
                                            class="text-secondary font-weight-bold text-xs btn btn-link mb-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addModal"
                                        >
                                            Edit
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="delete({{$admin->id}})"
                                            wire:confirm="Are you sure you want to delete this Admin?"
                                            class="text-danger font-weight-bold text-xs btn btn-link mb-0"
                                        >
                                            Delete
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ms-2">
                            {{ $admins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Admin Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="save">
                    <div class="modal-body">
                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" wire:model="email">
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" wire:model="password">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

