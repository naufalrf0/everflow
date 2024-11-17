<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ForumController extends Controller
{
    /**
     * Display the chat discussion view.
     */
    public function index()
    {
        // Fetch the latest 20 messages for initial display
        $forums = Forum::with('customer')->latest()->limit(20)->get();

        return view('user.forum', compact('forums'));
    }

    /**
     * Store a new message in the discussion.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'message' => 'required|string|max:255',
            ]);

            $user = auth()->user();

            $forum = Forum::create([
                'customer_id' => $user->role === 'customer' ? $user->id : null, 
                'admin_id' => $user->role === 'admin' ? $user->id : null,      
                'judul_postingan' => 'Topik Umum',
                'isi_postingan' => $request->message,
                'waktu_post' => now(),
            ]);

            return response()->json(['success' => true, 'forum' => $forum], 200);
        } catch (\Exception $e) {
            Log::error('Error storing forum message: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan.',
            ], 500);
        }
    }


    public function fetchMessages()
    {
        try {
            $forums = Forum::with('customer')->latest()->get();
            return response()->json(['forums' => $forums], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching forum messages:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Failed to fetch messages.'], 500);
        }
    }
}
