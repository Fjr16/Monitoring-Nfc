<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardAccessRequest;
use App\Models\MonitoringSystem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoorAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CardAccessRequest $request)
    {
        $data = $request->validated();
        $item = User::where('no_kartu', $data['card_id'])->first();
        if (!$item) {
            return response()->json([
                'success' => 'Gagal'
            ], 404);
        }

        // decode image base64 and save at public storage
        $base64StringImg = explode('data:image/png;base64,', $request->image);
        $imgData = base64_decode($base64StringImg[1]);
        $fileName = 'assets/img/' . uniqid() . '.png';
        Storage::put('public/'. $fileName, $imgData);
    
        MonitoringSystem::create([
            'user_id' => $item->id,
            'tanggal' => date('Y-m-d H:i:s'),
            'image' => $fileName,
        ]);
    
        return response()->json([
            'success' => 'Berhasil' 
        ], 200); 
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
