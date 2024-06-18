<?php

namespace App\Repositories\Teacher;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherRepository implements TeacherInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function changeStatus(int $id): array
    {
        $user = $this->user->where('id', $id)->first();
        $user->status = !$user->status;
        $user->update();

        return [
            'route' => 'teacher.list',
            'status' => true,
            'message' => 'User updated successfully.'
        ];

    }

    public function create(array $data, array $file): array
    {
        $data['role'] = config('constants.ROLE.TEACHER');
        $data['profile_picture'] = '';
        if (!empty($file['profile_picture']))
        {
            $image = $file['profile_picture'];
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folder = 'pictures/teacher';
            $image->move(public_path($folder), $imageName);
            $data['profile_picture'] = $folder . '/' . $imageName;
        }

        $password = (new Helper)->generateRandomPassword();
        $data['password'] = Hash::make($password);

        if ($this->user->create($data))
        {
            $data['raw_password'] = $password;
            Mail::to($data['email'])->send(new WelcomeMail($data));
            return [
                'route' => 'teacher.list',
                'status' => true,
                'message' => __('messages.create.success')
            ];
        }

        return [
            'route' => 'teacher.create',
            'status' => false,
            'message' => __('messages.create.fail')
        ];

    }

    public function getTeacherData(int $id): User
    {
        return $this->user->where('role', config('constants.ROLE.TEACHER'))
            ->where('id', $id)->first();
    }

    public function update(array $data, array $file): array
    {
        $user = $this->user->where('id', $data['id'])->first();

        if (!empty($file['profile_picture']))
        {
            $image = $file['profile_picture'];
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folder = 'pictures/teacher';
            $image->move(public_path($folder), $imageName);
            $data['profile_picture'] = $folder . '/' . $imageName;
        }
        $data['role'] = config('constants.ROLE.TEACHER');

        if ($user->update($data))
        {
            return [
                'route' => 'teacher.list',
                'status' => true,
                'message' => __('messages.update.success')
            ];
        }

        return [
            'route' => 'teacher.edit',
            'status' => false,
            'message' => __('messages.update.fail')
        ];
    }

    public function delete(int $id): array
    {
        $user = $this->user->where('id', $id)->first();
        if ($user->delete())
        {
            return [
                'route' => 'teacher.list',
                'status' => true,
                'message' => __('messages.delete.success')
            ];
        }

        return [
            'route' => 'teacher.list',
            'status' => false,
            'message' => __('messages.delete.fail')
        ];
    }
}
