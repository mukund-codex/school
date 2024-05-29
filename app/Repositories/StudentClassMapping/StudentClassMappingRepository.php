<?php

namespace App\Repositories\StudentClassMapping;

use App\Models\Classes;
use App\Models\Divisions;
use App\Models\StudentsClassesMapping;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class StudentClassMappingRepository implements StudentClassMappingInterface
{
    private StudentsClassesMapping $studentsClassesMapping;

    public function __construct(StudentsClassesMapping $studentsClassesMapping)
    {
        $this->studentsClassesMapping = $studentsClassesMapping;
    }

    public function index(): Collection
    {
        return $this->studentsClassesMapping->with('student')->with('class')->with('division')->get();
    }

    public function getClasses(): Collection
    {
        return Classes::all();
    }

    public function getDivisions(int $class_id): Collection
    {
        return Divisions::where('class_id', $class_id)->get();
    }

    public function getStudents(): Collection
    {
        return User::where('role', config('constants.ROLE.STUDENT'))->get();
    }

    public function create(array $input): array
    {
        $rollnos = $this->studentsClassesMapping->where('class_id', $input['class_id'])->where('division_id', $input['division_id'])->orderBy('id', 'desc')->pluck('roll_no')->first();
        $input['roll_no'] = $rollnos ? $rollnos + 1 : 1;
        $mapping = $this->studentsClassesMapping->where('student_id', $input['student_id'])->first();
        if ($mapping) {
            return [
                'route' => route('students.class.list'),
                'message' => 'Student already mapped to class.',
                'status' => 'failed'
            ];
        }

        $this->studentsClassesMapping->create($input);
        return [
            'route' => route('students.class.list'),
            'message' => 'Student class mapping created successfully',
            'status' => 'success'
        ];
    }

    public function show(int $id): array
    {
        $mapping = $this->studentsClassesMapping->where('id', $id)->with('student')->with('class')->with('division')->first();
        return [
            'mapping' => $mapping,
            'students' => User::where('role', config('constants.ROLE.STUDENT'))->get(),
            'classes' => Classes::all(),
            'divisions' => Divisions::where('class_id', $mapping->class_id)->get()
        ];
    }

    public function destroy(int $id): array
    {
        $this->studentsClassesMapping->where('id', $id)->delete();
        return [
            'route' => route('students.class.list'),
            'message' => 'Student class mapping deleted successfully',
            'status' => 'success'
        ];
    }
}
