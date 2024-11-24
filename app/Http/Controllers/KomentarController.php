<?php

namespace App\Http\Controllers;

use App\Services\KomentarService;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    protected KomentarService $komentarService;

    public function __construct(KomentarService $komentarService)
    {
        $this->komentarService = $komentarService;
    }

    /**
     * Display approved comments.
     */
    public function index(Request $request)
    {
        $bandulId = $request->query('bandul_id'); 
        $reviews = $this->komentarService->getApprovedComments($bandulId);

        return view('user.reviews', compact('reviews'));
    }

    /**
     * Store a new comment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bandul_id' => 'required|exists:t_bandul,id',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'profile_image' => 'nullable|image|max:2048', // Max 2MB file
        ]);

        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
        }

        $this->komentarService->storeComment([
            'user_id' => auth()->id(),
            'bandul_id' => $request->input('bandul_id'),
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            'profile_image' => $profileImagePath,
            'is_approved' => false, // Requires admin approval
            'created_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}
