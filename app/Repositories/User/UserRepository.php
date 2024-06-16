<?php

namespace App\Repositories\User;

use App\Models\Classes;
use App\Models\Divisions;
use App\Models\StudentAttendance;
use App\Models\Subjects;
use App\Models\TeacherAttendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserRepository implements UserInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function loginHandler(array $data): array
    {
        $response = [];
        if(Auth::attempt(
            [
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role']
            ]
        ))
        {
            $user = Auth::user();
            Session::put('first_name', $user->first_name);
            Session::put('last_name', $user->last_name);
            Session::put('email', $user->email);
            Session::put('mobile', $user->mobile);
            Session::put('profile_picture', $user->profile_picture);
            Session::put('address', $user->address);
            Session::put('dob', $user->dob);
            Session::put('gender', $user->gender);
            Session::put('role', $user->role);
            Session::put('id', $user->id);

            $response['status'] = true;
            $response['message'] = __('messages.login.success');
            $response['route'] = 'dashboard';

            return $response;
        }

        $response['status'] = false;
        $response['message'] = __('messages.login.failed');
        $response['route'] = 'login';

        return $response;
    }

    public function registerHandler(array $data, array $file): array
    {
        $password = Hash::make($data['password']);
        $data['password'] = $password;
        $response = [];
        $image = $file['profile_picture'];
        $imageName = time() . '_' . $image->getClientOriginalName();
        $folder = '';
        if ($data['role'] == 'admin')
        {
            $folder = 'pictures/admin';
        }
        if ($data['role'] == 'librarian')
        {
            $folder = 'pictures/librarian';
        }
        if ($data['role'] == 'teacher')
        {
            $folder = 'pictures/teacher';
        }
        if ($data['role'] == 'student')
        {
            $folder = 'pictures/student';
        }

        $image->move(public_path($folder), $imageName);
        $data['profile_picture'] = $folder . '/' . $imageName;
        if (User::create($data))
        {
            $response['status'] = true;
            $response['message'] = __('messages.register.success');
            $response['route'] = 'login';

            return $response;
        }

        $response['status'] = false;
        $response['message'] = __('messages.register.failed');
        $response['route'] = 'register';

        return $response;
    }

    public function getTeachersList(): Collection
    {
        return $this->user->where('role', 'teacher')->orderBy('id', 'desc')->get();
    }

    public function logoutHandler(): array
    {
        Auth::logout();
        Session::flush();
        return [
            'status' => true,
            'message' => __('messages.logout.success'),
            'route' => 'login'
        ];
    }

    public function dashboardData(): array
    {
        $data = [];
        $data['total_teachers'] = $this->user->where('role', 'teacher')->count();
        $data['total_students'] = $this->user->where('role', 'student')->count();
        $data['total_classes'] = Classes::where('status', true)->count();
        $data['present_teachers'] = TeacherAttendance::where('date', date('Y-m-d'))->where('status', 'present')->count();
        $data['absent_teachers'] = TeacherAttendance::where('date', date('Y-m-d'))->where('status', 'absent')->count();
        $data['present_students'] = StudentAttendance::where('date', date('Y-m-d'))->where('status', 'present')->count();
        $data['absent_students'] = StudentAttendance::where('date', date('Y-m-d'))->where('status', 'absent')->count();
        $data['male_students'] = $this->user->where('role', 'student')->where('gender', 'male')->count();
        $data['female_students'] = $this->user->where('role', 'student')->where('gender', 'female')->count();
        $data['total_subjects'] = Subjects::count();
        return $data;
    }
}
