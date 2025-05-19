<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'image'    => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }
        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->type     = 0;
        if ($request->image) {
            $user->image = $request->image->store('public', 'profile') ?? null;
        } else {
            $user->image = null;
        }
        $user->status = 1;

        $user->save();
        $token = $user->createToken(User::USER_TOKEN);
        $data  = [
            'user'  => $user,
            'token' => $token->plainTextToken,
        ];
        return $this->success($data, 'Success');
    }

    public function getStudent()
    {
        $studentUsers = Student::where('parent_id', Auth::user()->id)
            ->with('studentUser')
            ->get()
            ->pluck('studentUser');
        $data = [
            'student' => $studentUsers,
        ];
        return $this->success($data);

    }

    public function removeChild($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->success(null,'Student sussuccfuly deleted');
    }

    public function addStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'image'    => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->type     = 1;
        if ($request->image) {
            $user->image = $request->image->store('public', 'profile') ?? null;
        } else {
            $user->image = null;
        }
        $user->status = 1;
        $user->save();
        $student             = new Student();
        $student->student_id = $user->id;
        $student->parent_id  = Auth::user()->id;
        $student->save();

        $data = [
            'student' => $user,
        ];
        return $this->success($data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }
        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return $this->validationError('Wrong email address');
        }
        if (! Hash::check($request->password, $user->password)) {
            return $this->validationError('Wrong password');
        }
        $token = $user->createToken(User::USER_TOKEN);
        $data  = [
            'user'  => $user,
            'token' => $token->plainTextToken,
        ];
        return $this->success($data, 'Success');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }
        $user = Auth::user();
        if (! Hash::check($request->oldPassword, User::find($user->id)->password)) {
            return $this->validationError('Wrong password');
        }
        $user           = User::find($user->id);
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return $this->success(null, 'Success');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|min:3',
            'image' => 'nullable|image',
            'email' => 'nullable|email',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }
        $auth = Auth::user();
        $user = User::find($auth->id);
        if ($request->email) {
            if ($request->email != $user->email) {
                if (User::where('email', $request->email)->first()) {
                    return $this->validationError('Email address is already taken');
                }
                $user->email = $request->email;
            }
        }
        if ($request->image) {
            $user->image = $request->image->store('profile', 'public') ?? null;
        }
        $user->name = $request->name;
        $user->save();

        $data = [
            'user' => $user,
        ];

        return $this->success($data);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->success(null, 'logout success');
    }
}