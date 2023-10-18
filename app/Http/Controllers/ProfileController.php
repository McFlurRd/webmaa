<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = auth()->user();
        return view('auth.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $validatedData = $request->validated();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];


        // if ($request->password) {
        //     $user->password = Hash::make($request->password);
        // }

        $user->save();

        return redirect()->route('home')->with('success', 'Profil berhasil diperbarui!');
    }
}
