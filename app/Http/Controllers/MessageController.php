<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::where('conversation_id', $request->chatId)->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $data = [
            "conversation_id" => $request->conversation_id,
            "user_id" => auth()->user()->id,
            "content" => $request->content
        ];

        $message = Message::create($data);

        return response()->json($message);
    }
}
