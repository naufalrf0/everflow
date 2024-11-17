<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KomentarController extends Controller
{
    public function index()
    {
        $reviews = Komentar::with('customer')->latest()->paginate(10);

        return view('user.review', compact('reviews'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'customer_id' => 'required|exists:t_users,id',
                'isi_komentar' => 'required|string|max:255',
                'rating' => 'required|in:⭐,⭐⭐,⭐⭐⭐,⭐⭐⭐⭐,⭐⭐⭐⭐⭐',
                'profile_image' => 'nullable|image|max:2048',
            ], [
                'isi_komentar.required' => 'Komentar tidak boleh kosong.',
                'isi_komentar.max' => 'Komentar tidak boleh lebih dari 255 karakter.',
                'rating.required' => 'Rating harus dipilih.',
                'profile_image.image' => 'File harus berupa gambar.',
                'profile_image.max' => 'Ukuran gambar maksimal adalah 2MB.',
            ]);

            // Hitung jumlah bintang dari rating
            $jumlahLike = mb_strlen($request->input('rating'));

            // Upload gambar jika ada
            $profileImagePath = $request->file('profile_image')
                ? $request->file('profile_image')->store('profile_images', 'public')
                : 'profile_images/default-avatar.png';


            // Simpan ulasan ke database
            $review = Komentar::create([
                'customer_id' => $request->input('customer_id'),
                'admin_id' => null,
                'isi_komentar' => $request->input('isi_komentar'),
                'jumlah_like' => $jumlahLike, // Jumlah bintang
                'profile_image' => $profileImagePath,
                'waktu_komentar' => now(),
            ]);

            Log::info('Review berhasil disimpan', ['review_id' => $review->id]);

            return response()->json(['success' => true, 'review' => $review], 200);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan ulasan', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan ulasan. Silakan coba lagi.',
            ], 500);
        }
    }
}
