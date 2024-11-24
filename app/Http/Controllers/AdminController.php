<?php

namespace App\Http\Controllers;

use App\Services\BandulService;

class AdminController extends Controller
{
    protected $bandulService;

    public function __construct(BandulService $bandulService)
    {
        $this->bandulService = $bandulService;
    }

    public function index()
    {
        $dashboardData = $this->bandulService->getDashboardData();
        return view('admin.index', data: compact('dashboardData'));
    }
}
