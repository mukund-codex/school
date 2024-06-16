<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSchedulesRequest;
use App\Http\Requests\DeleteScheduleRequest;
use App\Http\Requests\GetScheduleRequest;
use App\Http\Requests\UpdateSchedulesRequest;
use App\Repositories\Schedules\ScheduleRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    private ScheduleRepository $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $schedules = $this->scheduleRepository->index();
        return view('classes.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        $teachers = $this->scheduleRepository->getTeachers();
        $classes = $this->scheduleRepository->getClasses();
        $subjects = $this->scheduleRepository->getSubjects();
        return view('classes.schedules.add', compact('teachers', 'classes', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSchedulesRequest $request): RedirectResponse
    {
        $this->scheduleRepository->store($request->validated());
        return redirect()->route('schedules.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GetScheduleRequest $request): View|Application|Factory
    {
        $teachers = $this->scheduleRepository->getTeachers();
        $classes = $this->scheduleRepository->getClasses();
        $subjects = $this->scheduleRepository->getSubjects();
        $scheduleData = $this->scheduleRepository->getSchedule($request->validated('id'));
        $schedule = $scheduleData[0];
        return view('classes.schedules.edit', compact('teachers', 'classes', 'subjects', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchedulesRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteScheduleRequest $request): RedirectResponse
    {
        $this->scheduleRepository->delete($request->validated('id'));
        return redirect()->route('schedules.list');
    }
}
