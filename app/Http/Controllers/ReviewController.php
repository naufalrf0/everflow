<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $komentars = Komentar::with(['user', 'bandul'])->get();
        return view('admin.review-management', compact('komentars'));
    }

    public function approve($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->update(['is_approved' => true]);

        return redirect()->route('review-management.index')->with('success', 'Komentar berhasil disetujui.');
    }

    public function reject($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->update(['is_approved' => false]);

        return redirect()->route('review-management.index')->with('success', 'Komentar berhasil ditolak.');
    }
}
