<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Repositories\Menu\MenuRepository;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected MenuRepository $menuRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = resolve(MenuRepository::class)->getAll();
        return view('backend.menus.index')
            ->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $this->menuRepository->save($request->all());
        return redirect()->route('menus.index')
        ->with('success', 'Înregistrare adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('backend.menus.show')
        ->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('backend.menus.edit')
            ->with('menu', $menu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $this->menuRepository->update($request->all(), $menu);
        return redirect()->route('menus.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $this->menuRepository->delete($menu);
        return redirect()->route('menus.index')
        ->with('danger', 'Act șters cu succes.');
    }
}
