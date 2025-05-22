<?php
namespace App\Livewire;

use App\Models\User;
use Flux\Flux;
use Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class AdminManagment extends Component
{
    public $name, $email, $status = true, $password;
    public $user;

    public function rules()
    {
        return [
            'name'     => 'required|string',
            'status'   => 'required|boolean',
            'password' => $this->user ? 'nullable|string|min:6' : 'required|string|min:6',
            'email'    => $this->user ? 'required|email|unique:users,email,' . $this->user->id : 'required|email|unique:users,email',

        ];
    }

    public function submit()
    {
        $this->validate();
        $user         = $this->user ?? new User();
        $user->name   = $this->name;
        $user->status = $this->status ?? false;
        $user->email  = $this->email;
        $user->type   = 2;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();
        $this->reset();
        Flux::modal('user-form')->close();
        LivewireAlert::title('Changes saved!')
            ->success()
            ->show();
    }

    public function add()
    {
        $this->reset();
        Flux::modal('user-form')->show();
    }

    public function edit($id)
    {
        $this->user   = User::findOrFail($id);
        $this->name   = $this->user->name;
        $this->email  = $this->user->email;
        $this->status = $this->user->status == 0 ? false : true;
        Flux::modal('user-form')->show();
    }
    public function render()
    {
        $users = User::where('type', 2)->get();
        $data  = [
            'users' => $users,
        ];
        return view('livewire.admin-managment', $data);
    }
}
