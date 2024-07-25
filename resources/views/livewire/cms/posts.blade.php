<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Posts</h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" wire:click="add">
                        Add
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7">Image / Title</th>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mini Description</th>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Website</th>
                                <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                                <th class="opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            @if($post->image)
                                                <a href="/{{$post->image}}" target="_blank">
                                                    <img src="/{{$post->image}}" class="avatar avatar-sm me-3 pt-2" alt="post">
                                                </a>
                                            @endif
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$post->ar_title}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs font-weight-bold mb-0">
                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$post->ar_mini_description}}">
                                                {{ substr($post->ar_mini_description, 0, 75) }}{{ strlen($post->ar_mini_description) > 75 ? '...' : '' }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs font-weight-bold mb-0">
                                            <div class="d-flex flex-column justify-content-center">
                                                {{$post->ar_author}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs font-weight-bold mb-0">
                                            <div class="d-flex flex-column justify-content-center">
                                                {{$post->type}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs font-weight-bold mb-0">
                                            <div class="d-flex flex-column justify-content-center">
                                                {{$post->website}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs font-weight-bold mb-0">
                                            <div class="d-flex flex-column justify-content-center">
                                                {{$post->created_at}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            wire:click="edit({{$post->id}})"
                                            class="text-secondary font-weight-bold text-xs btn btn-link mb-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addModal"
                                        >
                                            Edit
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="delete({{$post->id}})"
                                            wire:confirm="Are you sure you want to delete this Post?"
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
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade lg" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Post Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="save" id="post_form">
                    <div class="modal-body">
                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="ar_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="ar_title" wire:model="ar_title" required maxlength="45">
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="en_description" class="form-label">Mini Description</label>
                                <textarea class="form-control" id="en_description" wire:model="ar_mini_description" maxlength="350"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ar_description" class="form-label">Description</label>
                                <textarea class="form-control" id="ar_description" wire:model="ar_description" maxlength="350"></textarea>
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="ar_author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="ar_author" wire:model="ar_author" required maxlength="45">
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" wire:model="type" required maxlength="45">
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" id="website" wire:model="website" required maxlength="45">
                            </div>
                        </div>

                        <div class="input-group-section">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" wire:model="image" accept="image/*">
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

