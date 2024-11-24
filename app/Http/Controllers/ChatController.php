<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        try {
            $messages = Forum::with('user')->orderBy('created_at', 'asc')->get();
            return view('admin.chat', compact('messages'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to fetch messages. Please try again later.']);
        }
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|max:255',
        ]);

        try {
            Forum::create([
                'user_id' => Auth::id(),
                'pesan' => $request->pesan,
                'created_at' => now(),
            ]);

            return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to send message.'], 500);
        }
    }
}
