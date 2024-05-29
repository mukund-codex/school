<?php

namespace App\Repositories\Students;

use App\Models\StudentEnrollment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements StudentInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getStudentList(): Collection
    {
        return $this->user->where('role', config('constants.ROLE.STUDENT'))
            ->with('studentEnrollment')
            ->get();
    }

    public function store(array $input, array $file): array
    {
        $input['role'] = config('constants.ROLE.STUDENT');

        $image = $file['profile_picture'];
        $imageName = time() . '_' . $image->getClientOriginalName();
        $folder = 'pictures/student';
        $image->move(public_path($folder), $imageName);
        $input['profile_picture'] = $folder . '/' . $imageName;

        if ($user = $this->user->create($input))
        {
            $this->studentEnrollment($user);
            return [
                'route' => 'students.list',
                'status' => true,
                'message' => __('messages.create.success')
            ];
        }

        return [
            'route' => 'students.create',
            'status' => false,
            'message' => __('messages.create.fail')
        ];
    }

    public function getStudentData(int $id): User
    {
        return $this->user->where('role', config('constants.ROLE.STUDENT'))
            ->where('id', $id)->with('studentEnrollment')->first();
    }

    public function update(array $input, array $file): array
    {
        $user = $this->user->where('id', $input['id'])->first();

        if (!empty($file['profile_picture']))
        {
            $image = $file['profile_picture'];
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folder = 'pictures/student';
            $image->move(public_path($folder), $imageName);
            $input['profile_picture'] = $folder . '/' . $imageName;
        }
        $input['role'] = config('constants.ROLE.STUDENT');

        if ($user->update($input))
        {
            return [
                'route' => 'students.list',
                'status' => true,
                'message' => __('messages.update.success')
            ];
        }

        return [
            'route' => 'students.edit',
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
                'route' => 'students.list',
                'status' => true,
                'message' => __('messages.delete.success')
            ];
        }

        return [
            'route' => 'students.list',
            'status' => false,
            'message' => __('messages.delete.fail')
        ];
    }

    public function changeStatus(int $id): array
    {
        $user = $this->user->where('id', $id)->first();
        $user->status = !$user->status;
        $user->update();

        return [
            'route' => 'students.list',
            'status' => true,
            'message' => __('messages.update.success')
        ];
    }

    private function studentEnrollment(User $user): void
    {
        StudentEnrollment::create([
            'student_id' => $user->id,
            'enrollment_number' => 'REG' . time(),
        ]);
    }
}
