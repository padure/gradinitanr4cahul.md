<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventCategory;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_categories = EventCategory::all();
        return view('backend.event_categories.index')
            ->with('event_categories', $event_categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventCategories = EventCategory::all();
        return view('backend.event_categories.create')
            ->with('eventCategories', $eventCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        EventCategory::create($request->all());
        return redirect()->route('event-category.index');
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
    public function edit(string $id)
    {
        $category = EventCategory::findOrFail($id);
        return view('backend.event_categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = EventCategory::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('event-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
