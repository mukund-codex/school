<?php

namespace App\Repositories\StudentDetails;

use App\Models\StudentDetails;
use App\Models\User;

class StudentDetailsRepository implements StudentDetailsInterface
{
    private StudentDetails $studentDetails;
    private User $user;

    public function __construct(StudentDetails $studentDetails, User $user)
    {
        $this->studentDetails = $studentDetails;
        $this->user = $user;
    }

    public function index(int $id): array
    {
        $data = $this->studentDetails->where('student_id', $id)->get()->toArray();
        return [
            'data' => $data,
            'message' => 'Student details fetched successfully',
            'status' => 'success',
            'route' => 'students.details.index'
        ];
    }

    public function create(array $data): array
    {
        $student = $this->user->find($data['student_id']);
        if ($student) {
            StudentDetails::create($data);
            return [
                'message' => 'Student details added successfully',
                'status' => 'success',
                'route' => route('students.details', ['id' => $data['student_id']]),
            ];
        }

        return [
            'message' => 'Student not found',
            'status' => 'failed',
            'route' => route('students.details.add', ['id' => $data['student_id']])
        ];
    }

    public function delete(int $id): array
    {
        $student = $this->studentDetails->find($id);
        if ($student) {
            $student->delete();
            return [
                'message' => 'Student details deleted successfully',
                'status' => 'success',
                'route' => route('students.details', ['id' => $student->student_id]),
            ];
        }

        return [
            'message' => 'Student details not found',
            'status' => 'failed',
            'route' => route('students.details', ['id' => $student->student_id])
        ];
    }

    public function getStudentDetail(int $id): array
    {
        $data = $this->studentDetails->find($id);
        if ($data) {
            return [
                'data' => $data,
                'message' => 'Student details fetched successfully',
                'status' => 'success',
                'route' => 'students.details.edit'
            ];
        }

        return [
            'message' => 'Student details not found',
            'status' => 'failed',
            'route' => 'students.details.index'
        ];
    }

    public function update(array $data): array
    {
        $student = $this->studentDetails->find($data['id']);
        if ($student) {
            $student->update($data);
            return [
                'message' => 'Student details updated successfully',
                'status' => 'success',
                'route' => route('students.details', ['id' => $student['student_id']]),
            ];
        }
    }
}
