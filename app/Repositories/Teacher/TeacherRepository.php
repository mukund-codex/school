<?php

namespace App\Repositories\Teacher;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
        $image = $file['profile_picture'];
        $imageName = time() . '_' . $image->getClientOriginalName();
        $folder = 'pictures/teacher';
        $image->move(public_path($folder), $imageName);
        $data['profile_picture'] = $folder . '/' . $imageName;

        if ($this->user->create($data))
        {
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
