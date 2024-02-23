<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardAccessRequest;
use App\Http\Requests\PinAccessRequest;
use App\Models\MonitoringSystem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoorAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $request->validate([
        'card_id' => ['required', 'string'],
        'image' => ['required', 'image'],
    ]);


    $item = User::where('no_kartu', $request->card_id)->first();
    if (!$item) {
        return response()->json([
            'status' => false
        ], 404);
    }

    // Save the uploaded image
    $imagePath = $request->file('image')->store('assets/img');


    MonitoringSystem::create([
        'user_id' => $item->id,
        'tanggal' => now(),
        'image' => $imagePath,
    ]);

    return response()->json([
        'status' => true
    ], 200);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        error_log("SAMPAI SINI");
    $request->validate([
        'pin_number' => ['required', 'string'],
        'image' => ['required', 'image'],
    ]);

    $item = User::where('pin_number', $request->pin_number)->first();
    if (!$item) {
        return response()->json([
            'status' => false
        ], 404);
    }

    // Save the uploaded image
    $imagePath = $request->file('image')->store('assets/img');


    MonitoringSystem::create([
        'user_id' => $item->id,
        'tanggal' => now(),
        'image' => $imagePath,
    ]);

    return response()->json([
        'status' => true
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
