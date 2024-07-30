<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDivisionRequest;
use App\Http\Requests\DeleteDivisionRequest;
use App\Http\Requests\DivisionsRequest;
use App\Http\Requests\GetDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Repositories\Divisions\DivisionRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    private DivisionRepository $divisionRepository;

    public function __construct(DivisionRepository $divisionRepository)
    {
        $this->divisionRepository = $divisionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Application|Factory
    {
        $divisions = $this->divisionRepository->index();
        return view('classes.divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        $classes = $this->divisionRepository->getClasses();
        return view('classes.divisions.add', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDivisionRequest $request): RedirectResponse
    {
        $response = $this->divisionRepository->store($request->validated());
        return redirect()->route('divisions.list');
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
    public function edit(GetDivisionRequest $request): View|Application|Factory
    {
        $division = $this->divisionRepository->getDivision($request->validated('id'));
        $classes = $this->divisionRepository->getClasses();
        return view('classes.divisions.edit', compact('division', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDivisionRequest $request): RedirectResponse
    {
        $response = $this->divisionRepository->update($request->validated());
        return redirect()->route('divisions.list', ['id' => $request->validated('class_id')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteDivisionRequest $request): RedirectResponse
    {
        $class_id = $this->divisionRepository->delete($request->validated('id'));
        return redirect()->route('divisions.list', ['id' => $class_id]);
    }
}
