<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Conversation::with('user_1', 'user_2')
            ->where('user_1', auth()->user()->id)
            ->orWhere('user_2', auth()->user()->id)
            ->get();

        //$messages = Conversation::with('user', 'messages')->find(1);

        //dd($chats);

        return Inertia::render('Chat/Index', compact('chats'));
    }

    public function createConversation(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $data = [
            'user_1' => auth()->user()->id,
            'user_2' => $user->id
        ];

        Conversation::create($data);
    }
}
