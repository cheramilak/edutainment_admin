<?php
namespace App\Livewire;

use App\Models\Student;
use App\Models\User;
use Flux\Flux;
use Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class StudentManagment extends Component
{
    public $name, $email, $status = true, $password;
    public $user;
    public $parent;

    public function rules()
    {
        return [
            'name'     => 'required|string',
            'status'   => 'required|boolean',
            'password' => $this->user ? 'nullable|string|min:6' : 'required|string|min:6',
            'email'    => $this->user ? 'required|email|unique:users,email,' . $this->user->id : 'required|email|unique:users,email',

        ];
    }

    public function mount($id)
    {
        $this->parent = User::where('id', $id)->where('type', 0)->firstOrFail();
    }

    public function submit()
    {
        $this->validate();
        $user         = $this->user ?? new User();
        $user->name   = $this->name;
        $user->status = $this->status ?? false;
        $user->email  = $this->email;
        $user->type   = 1;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();
        if (! $this->user) {
            $student             = new Student();
            $student->student_id = $user->id;
            $student->parent_id  = $this->parent->id;
            $student->save();
        }
        $this->resetExcept('parent');
        Flux::modal('user-form')->close();
        LivewireAlert::title('Changes saved!')
            ->success()
            ->show();
    }

    public function add()
    {
        $this->resetExcept('parent');
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
        $studentUsers = Student::where('parent_id', $this->parent->id)
            ->with('studentUser')
            ->get()
            ->pluck('studentUser');
        $data = [
            'users' => $studentUsers,
        ];

        // dd($studentUsers);

        return view('livewire.student-managment', $data);
    }
}
