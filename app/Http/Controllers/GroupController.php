<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Repositories\Group\GroupRepository;
use Intervention\Image\ImageManagerStatic as Image;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected GroupRepository $groupRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $groups = resolve(GroupRepository::class)->getAll();
        return view('backend.groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        $this->groupRepository->save($request->all());
        return redirect()->route('groups.index')
            ->with('success', 'Grup adaugat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('backend.group.show')
        ->with('group', $group);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('backend.groups.edit')
        ->with('group', $group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $this->groupRepository->update($request->all(), $group);
        return redirect()->route('groups.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $this->groupRepository->delete($group);
        return redirect()->route('groups.index')
        ->with('danger', 'Grup șters cu succes.');
    }
}
