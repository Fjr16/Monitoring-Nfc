<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardTemporary;

class GetCardNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($card_id)
    {
        $data = CardTemporary::get()->pluck('id');
        CardTemporary::destroy($data);
        
        CardTemporary::create([
            'no_kartu' => $card_id,
        ]);

        return response()->json([
            'success' => 'Berhasil'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $item = CardTemporary::get()->first();
        return response()->json($item->no_kartu);
    }
}
