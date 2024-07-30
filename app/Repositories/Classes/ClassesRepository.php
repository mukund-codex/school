<?php

namespace App\Repositories\Classes;

use App\Models\Classes;
use App\Models\Divisions;
use App\Models\Schedules;
use App\Models\StudentsClassesMapping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class ClassesRepository implements ClassesInterface
{
    private Classes $classes;
    public function __construct(Classes $classes)
    {
        $this->classes = $classes;
    }

    public function index(): Collection
    {
        return $this->classes->all();
    }

    public function store(array $input): array
    {
        $classes = $this->classes->create($input);
        return [
            'route' => 'classes.list',
            'status' => 'success',
            'message' => 'Class created successfully'
        ];
    }

    public function changeStatus(int $id): array
    {
        $class = $this->classes->where('id', $id)->first();
        $class->status = !$class->status;
        $class->update();

        return [
            'route' => 'classes.list',
            'status' => true,
            'message' => 'Class updated successfully.'
        ];
    }

    public function getClasses(int $id)
    {
        return $this->classes->where('id', $id)->first();
    }

    public function update(array $input): array
    {
        $class = $this->classes->where('id', $input['id'])->first();
        $class->update($input);

        return [
            'route' => 'classes.list',
            'status' => true,
            'message' => 'Class updated successfully.'
        ];
    }

    public function delete(int $id): array
    {
        $class = $this->classes->where('id', $id)->first();
        StudentsClassesMapping::where('class_id', $id)->delete();
        Schedules::where('class_id', $id)->delete();
        Divisions::where('class_id', $id)->delete();
        $class->delete();

        return [
            'route' => 'classes.list',
            'status' => true,
            'message' => 'Class deleted successfully.'
        ];
    }

    public function upload(array $input): RedirectResponse
    {
        try {
            $file = $input['csv_file'];
            $path = $file->getRealPath();
            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);
            foreach ($data as $row) {
                $rowData = array_combine($header, $row);
                Subject::create([
                    'subject_name' => $rowData['subject_name'],
                    'subject_code' => $rowData['subject_code'],
                ]);
            }

            return back()->with('success', 'CSV data imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'There was an error processing the CSV file.');
        }
    }
}
