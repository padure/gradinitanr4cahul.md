<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Requests\Section\StoreSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Repositories\Section\SectionRepository;

class SectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected SectionRepository $sectionRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('backend.sections.index')
            ->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $this->sectionRepository->save($request->all());
        return redirect()->route('sections.index')
            ->with('success', 'Categorie adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view('backend.sections.show')
        ->with('section', $section);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return view('backend.sections.edit')
        ->with('section', $section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $this->sectionRepository->update($request->all(), $section);
        return redirect()->route('sections.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $this->sectionRepository->delete($section);
        return redirect()->route('sections.index')
        ->with('danger', 'Categorie ștearsa cu succes.');
    }
}
