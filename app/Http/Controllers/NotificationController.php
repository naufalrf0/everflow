<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications');
    }
}
