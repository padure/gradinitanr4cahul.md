<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Repositories\Message\MessageRepository;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected MessageRepository $messageRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = resolve(MessageRepository::class)->getAll();
        return view('backend.messages.index')
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {     
        Message::create($request->all());
     
        return redirect()->route('contacts.index')
        ->with('success', 'Mesajul tău a fost transmis cu succes!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $this->messageRepository->delete($message);
        return redirect()->route('messages.index')
        ->with('danger', 'Mesaj șters cu succes.');
    }
}
