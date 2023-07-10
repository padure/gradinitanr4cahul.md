<?php

namespace App\Http\Controllers;

use App\Models\Law;
use App\Http\Requests\Law\StoreLawRequest;
use App\Http\Requests\Law\UpdateLawRequest;
use App\Repositories\Law\LawRepository;
use App\Repositories\Section\SectionRepository;

class LawController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected LawRepository $lawRepository,
        protected SectionRepository $sectionRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laws = resolve(LawRepository::class)->getAll();
        return view('backend.laws.index')
            ->with('laws', $laws);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = resolve(SectionRepository::class)->getAll();
        return view('backend.laws.create')
            ->with('sections', $sections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLawRequest $request)
    {
        $this->lawRepository->save($request->all());
        return redirect()->route('laws.index')
        ->with('success', 'Înregistrare adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Law $law)
    {
        return view('backend.laws.show')
        ->with('law', $law);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Law $law)
    {
        $sections = resolve(SectionRepository::class)->getAll();
        return view('backend.laws.edit')
            ->with('sections', $sections)
            ->with('law', $law);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLawRequest $request, Law $law)
    {
        $this->lawRepository->update($request->all(), $law);
        return redirect()->route('laws.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Law $law)
    {
        $this->lawRepository->delete($law);
        return redirect()->route('laws.index')
        ->with('danger', 'Act șters cu succes.');
    }
}
