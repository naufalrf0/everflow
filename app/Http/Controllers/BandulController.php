<?php

namespace App\Http\Controllers;

use App\Models\Bandul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandulController extends Controller
{
    public function index()
    {
        $banduls = Bandul::all();
        return view('admin.bandul', compact('banduls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'voltase_baterai' => 'required|numeric',
            'kecepatan_bandul' => 'required|numeric',
            'total_daya' => 'required|numeric',
            'hasil_daya' => 'required|numeric',
            'waktu_kinerja_bandul' => 'required|date',
        ]);

        $bandul = new Bandul($request->all());
        $bandul->customer_id = Auth::id(); // Mengisi customer_id dengan ID pengguna yang sedang login
        $bandul->admin_id = Auth::id();    // Jika diperlukan
        $bandul->save();

        return redirect()->route('bandul-management.index')->with('success', 'Data Bandul berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'voltase_baterai' => 'required|numeric',
            'kecepatan_bandul' => 'required|numeric',
            'total_daya' => 'required|numeric',
            'hasil_daya' => 'required|numeric',
            'waktu_kinerja_bandul' => 'required|date',
        ]);

        $bandul = Bandul::findOrFail($id);
        $bandul->fill($request->all());
        $bandul->customer_id = Auth::id(); // Mengisi customer_id jika diperlukan
        $bandul->admin_id = Auth::id();    // Jika diperlukan
        $bandul->save();

        return redirect()->route('bandul-management.index')->with('success', 'Data Bandul berhasil diubah.');
    }

    public function destroy($id)
    {
        $bandul = Bandul::findOrFail($id);
        $bandul->delete();

        return redirect()->route('bandul-management.index')->with('success', 'Data Bandul berhasil dihapus.');
    }
}
