<?php

namespace App\Http\Controllers;

use App\Services\BandulService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BandulController extends Controller
{
    protected $bandulService;

    public function __construct(BandulService $bandulService)
    {
        $this->bandulService = $bandulService;
    }

    public function index()
    {
        try {
            $banduls = $this->bandulService->getAllBandul();
            return view('admin.bandul-management', compact('banduls'));
        } catch (\Exception $e) {
            Log::error('Failed to fetch Bandul data: ' . $e->getMessage());
            return redirect()->route('bandul-management.index')->with('error', 'Gagal memuat data Bandul.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'voltase_baterai' => 'required|numeric',
            'kecepatan_bandul' => 'required|numeric',
            'total_daya' => 'required|numeric',
            'hasil_daya' => 'required|numeric',
            'waktu_kinerja_bandul' => 'required|date_format:Y-m-d\TH:i',
        ]);

        try {
            $this->bandulService->createBandul($request->all());
            return redirect()->route('bandul-management.index')->with('success', 'Data Bandul berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Failed to create Bandul: ' . $e->getMessage());
            return redirect()->route('bandul-management.index')->with('error', 'Gagal menambahkan data Bandul.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'voltase_baterai' => 'required|numeric',
            'kecepatan_bandul' => 'required|numeric',
            'total_daya' => 'required|numeric',
            'hasil_daya' => 'required|numeric',
            'waktu_kinerja_bandul' => 'required|date_format:Y-m-d\TH:i',
        ]);

        try {
            $this->bandulService->updateBandul($id, $request->all());
            return redirect()->route('bandul-management.index')->with('success', 'Data Bandul berhasil diubah.');
        } catch (\Exception $e) {
            Log::error("Failed to update Bandul with ID {$id}: " . $e->getMessage());
            return redirect()->route('bandul-management.index')->with('error', 'Gagal mengubah data Bandul.');
        }
    }

    public function destroy($id)
    {
        try {
            $this->bandulService->deleteBandul($id);
            return redirect()->route('bandul-management.index')->with('success', 'Data Bandul berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error("Failed to delete Bandul with ID {$id}: " . $e->getMessage());
            return redirect()->route('bandul-management.index')->with('error', 'Gagal menghapus data Bandul.');
        }
    }
}
