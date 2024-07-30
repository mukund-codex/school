<?php

namespace App\Repositories\Students;

use App\Helpers\Helper;
use App\Mail\WelcomeMail;
use App\Models\StudentAttendance;
use App\Models\StudentEnrollment;
use App\Models\StudentsClassesMapping;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        $input['profile_picture'] = null;
        if (isset($file['profile_picture'])){
            $image = $file['profile_picture'];
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folder = 'pictures/student';
            $image->move(public_path($folder), $imageName);
            $input['profile_picture'] = $folder . '/' . $imageName;
        }

        $password = (new Helper)->generateRandomPassword();
        $data['password'] = Hash::make($password);

        if ($user = $this->user->create($input))
        {
            if (!empty($data['email']))
            {
                $data['raw_password'] = $password;
                Mail::to($data['email'])->send(new WelcomeMail($data));
            }
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
        StudentAttendance::where('student_id', $id)->delete();
        StudentsClassesMapping::where('student_id', $id)->delete();
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
        $enrollment = StudentEnrollment::orderBy('id', 'desc')->first()->enrollment_number;
        $enrollment_number = explode('REG', $enrollment);
        $enrollment_number = (int) $enrollment_number[1] + 1;
        $number = str_pad($enrollment_number, 10, '0', STR_PAD_LEFT);
        StudentEnrollment::create([
            'student_id' => $user->id,
            'enrollment_number' => 'REG' . $number,
        ]);
    }
}
