<?php

namespace App\Http\Controllers;

use App\Models\MonitoringSystem;
use App\Models\User;
use Illuminate\Http\Request;

class DoorAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($card_id)
    {
        $item = User::where('no_kartu', $card_id)->first();
        if ($item) {
            MonitoringSystem::create([
                'user_id' => $item->id,
                'tanggal' => date('Y-m-d H:i:s'),
                // 'image' => null,
            ]);

            return response()->json([
                'success' => 'Berhasil' 
            ], 200); 
        }else{
            return response()->json([
                'success' => 'Gagal'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
