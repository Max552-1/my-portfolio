<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display all messages.
     */
    public function index()
    {
        $messages = Message::latest()->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Display a specific message.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Delete a message.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}