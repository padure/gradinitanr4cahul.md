<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Repositories\Event\EventRepository;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected EventRepository $eventRepository,
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = resolve(EventRepository::class)->getAll();
        return view('backend.events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventCategories = EventCategory::all();
        return view('backend.events.create')
            ->with('eventCategories', $eventCategories);
    }       

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $this->eventRepository->save($request->all());
        return redirect()->route('events.index')
        ->with('success', 'Înregistrare adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('backend.events.show')
        ->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $eventCategories = EventCategory::all();
        return view('backend.events.edit')
        ->with('eventCategories', $eventCategories)
        ->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->title       = $request->title;
        $event->description = $request->description;
        $event->body = $request->body;
        $event->autor = $request->autor;
        $event->event_category_id = $request->event_category_id;
        if( $request->image === null ){
            $event->image = $event->image;
        }else{
            if (file_exists(env('UPLOADS_EVENT') . $event->image)) {
                unlink(env('UPLOADS_EVENT') . $event->image);
            }
            $extension  = $request->image->getClientOriginalExtension();
            $fileName   = $request->image->getClientOriginalName();
            $event->image       = time().'.'.$extension;
            Image::make($request->image)
                ->fit(1366, 768)
                ->save(public_path(env('UPLOADS_EVENT')) . $event->image);
        }
        $event->save();
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
