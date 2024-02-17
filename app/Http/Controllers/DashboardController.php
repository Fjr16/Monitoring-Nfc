<?php

namespace App\Http\Controllers;

use App\Models\MonitoringSystem;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MonitoringSystem::latest()->limit(5)->get();
        return view('pages.dashboard.index', [
            "title" => "Dashboard",
            "menu" => "Dashboard",
            "data" => $data,
        ]);
    }
}
