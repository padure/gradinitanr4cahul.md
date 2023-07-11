<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Repositories\Setting\SettingRepository;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected SettingRepository $settingRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = resolve(SettingRepository::class)->getAll();
        return view('backend.settings.index')
            ->with('settings', $settings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $this->settingRepository->save($request->all());
        return redirect()->route('settings.index')
            ->with('success', 'Înregistrare adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('backend.settings.show')
        ->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('backend.settings.edit')
        ->with('setting', $setting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $this->settingRepository->update($request->all(), $setting);
        return redirect()->route('settings.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')
        ->with('delete', 'Înregistrare ștearsă cu succes.');
    }
}
