<?php

namespace App\Livewire\Cms;

use App\Models\Post as PostModel;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Posts extends Component
{
    use WithFileUploads;
    public $mode = 'create';
    public $id = null;
    public $ar_title = '';
    public $ar_description = '';
    public $ar_mini_description = '';
    public $ar_author = '';
    public $type = '';
    public $website = '';
    public $image = '';

    public function add(): void
    {
        $this->ar_title = '';
        $this->ar_mini_description = '';
        $this->ar_description = '';
        $this->ar_author = '';
        $this->type = '';
        $this->website = '';
        $this->image = '';
        $this->id = '';
        $this->mode = 'create';
        $this->dispatch('updateEditor', '');
    }

    public function edit($postId): void
    {
        $post = PostModel::findOrFail($postId);
        $this->ar_title = $post->ar_title;
        $this->ar_mini_description = $post->ar_mini_description;
        $this->ar_description = $post->ar_description;
        $this->ar_author = $post->ar_author;
        $this->type = $post->type;
        $this->website = $post->website;
        $this->id = $postId;
        $this->image = '';
        $this->mode = 'edit';
        $this->dispatch('updateEditor', $post->ar_description);
    }

    public function save(): void
    {
        $data = $this->only([
            'ar_title',
            'ar_mini_description',
            'ar_description',
            'ar_author',
            'type',
            'website',
        ]);
        if ($this->mode === 'create') {
            if ($this->image)
                $data['image'] = $this->image->storePublicly('img/posts', 'public');
            else
                $data['image'] = '';
            PostModel::create($data);
        } else if ($this->mode === 'edit') {
            $post = PostModel::find($this->id);
            if ($post) {
                if ($this->image) {
                    File::delete(public_path($post->image));
                    $data['image'] = $this->image->storePublicly('img/posts', 'public');
                }
                $post->update($data);
            }
        }
        $this->redirect('/cms');
    }

    public function delete($id): void
    {
        $post = PostModel::find($id);
        File::delete(public_path($post->image));
        $post->delete();
        $this->redirect('/cms');
    }

    public function render(): View|Application|Factory|ContractsApplication
    {
        return view('livewire.cms.posts', [
            'posts' => PostModel::paginate(5),
        ])->layoutData(['page' => 'posts']);
    }
}
