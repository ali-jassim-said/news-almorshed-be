<?php

namespace App\Livewire\Cms;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Admins extends Component
{
    public $mode = 'create';
    public $id = null;
    public $name = '';
    public $email = '';
    public $password = '';

    public function add(): void
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->id = '';
        $this->mode = 'create';
    }

    public function edit($Id): void
    {
        $user = User::findOrFail($Id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->id = $Id;
        $this->mode = 'edit';
    }

    public function save(): void
    {
        $data = $this->only([
            'name',
            'email',
            'password'
        ]);
        if ($this->mode === 'create') {
            $data['password'] = Hash::make($data['password']);
            User::create($data);
        } else if ($this->mode === 'edit') {
            if (isset($data['password']) && $data['password'])
                $data['password'] = Hash::make($data['password']);
            else
                unset($data['password']);
            $user = User::find($this->id);
            $user?->update($data);
        }
        $this->redirect('/cms/admins');
    }

    public function delete($id): void
    {
        $partner = User::find($id);
        $partner->delete();
        $this->redirect('/cms/admins');
    }

    public function render(): View|Application|Factory|ContractsApplication
    {
        return view('livewire.cms.admins', [
            'admins' => User::paginate(5),
        ])->layoutData(['page' => 'admins']);
    }
}
