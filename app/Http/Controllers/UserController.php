<?php

namespace App\Http\Controllers;

use App\Models\CardTemporary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('pages.user.index', [
            'title' => 'User',
            'menu' => 'User',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = [
            'Admin',
            'Manager',
            'User',
        ];
        $jks = [
            'Laki-laki',
            'Perempuan',
        ];
        return view('pages.user.create', [
            "title" => "User",
            "menu" => "User",
            "roles" => $roles,
            "jks" => $jks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required'],
            'name' => ['required'],
            'no_kartu' => ['required', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => Rules\Password::defaults(),
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        $dataCardNumber = CardTemporary::get()->pluck('id');
        CardTemporary::destroy($dataCardNumber);

        return redirect()->route('user.index')->with('success', 'Berhasil Ditambahkan');
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
    public function edit($id)
    {
        $roles = [
            'Admin',
            'Manager',
            'User',
        ];
        $jks = [
            'Laki-laki',
            'Perempuan',
        ];
        $item = User::find($id);
        return view('pages.user.edit', [
            "title" => "User",
            "menu" => "User",
            "item" => $item,
            "roles" => $roles,
            "jks" => $jks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $data = $request->all();
        $dataToValidation = [
            'role' => ['required'],
            'name' => ['required'],
            'no_kartu' => ['required', Rule::unique('users')->ignore($item->id)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($item->id)],
        ];

        if ($request->password != null) {
            $dataToValidation['password'] = Rules\Password::defaults();
            $data['password'] = Hash::make($request->password);
        }else{
            $data['password'] = $item->password;
        }

        $request->validate($dataToValidation);

        $item->update($data);

        return redirect()->route('user.index')->with('success', 'Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();

        return back()->with('success', 'Berhasil Dihapus');
    }
}
