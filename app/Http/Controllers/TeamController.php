<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Repositories\Team\TeamRepository;
use Intervention\Image\ImageManagerStatic as Image;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected TeamRepository $teamRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = resolve(TeamRepository::class)->getAll();
        return view('backend.teams.index')
            ->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $this->teamRepository->save($request->all());
        return redirect()->route('teams.index')
            ->with('success', 'Membru adaugat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('backend.teams.show')
        ->with('team', $team);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('backend.teams.edit')
        ->with('member', $team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $this->teamRepository->update($request->all(), $team);
        return redirect()->route('teams.index')
            ->with('warning', 'Actualizare cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $this->teamRepository->delete($team);
        return redirect()->route('teams.index')
        ->with('danger', 'Membru ștears cu succes.');
    }
}
