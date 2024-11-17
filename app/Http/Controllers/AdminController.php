<?php

namespace App\Http\Controllers;

use App\Models\Bandul;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bandulData = Bandul::latest()->take(3)->get()->reverse();

        $dashboardData = [
            'kecepatan_bandul' => $bandulData->last()->kecepatan_bandul ?? 0,
            'total_energi' => $bandulData->last()->total_daya ?? 0,
            'voltase_baterai' => $bandulData->last()->voltase_baterai ?? 0,
            'report' => $bandulData,
        ];

        return view('admin.index', compact('dashboardData'));
    }
}
