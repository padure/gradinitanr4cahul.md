<?php

namespace App\Http\Controllers;

use App\Models\Regime;
use App\Http\Requests\Regime\StoreRegimeRequest;
use App\Http\Requests\Regime\UpdateRegimeRequest;
use App\Repositories\Regime\RegimeRepository;

class RegimeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected RegimeRepository $regimeRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regimes = resolve(RegimeRepository::class)->getAll();
        return view('backend.regimes.index')
            ->with('regimes', $regimes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.regimes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegimeRequest $request)
    {
        $this->regimeRepository->save($request->all());
        return redirect()->route('regimes.index')
        ->with('success', 'Înregistrare adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regime $regime)
    {
        return view('backend.regimes.show')
        ->with('regime', $regime);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regime $regime)
    {
        return view('backend.regimes.edit')
            ->with('regime', $regime);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegimeRequest $request, Regime $regime)
    {
        $this->regimeRepository->update($request->all(), $regime);
        return redirect()->route('regimes.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regime $regime)
    {
        $this->regimeRepository->delete($regime);
        return redirect()->route('regimes.index')
        ->with('danger', 'Act șters cu succes.');
    }
}
