<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('auth.passwords.edit');
    }

    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword))
        {
            auth()->user()->update([
                'password' => password_hash(request('password'), PASSWORD_BCRYPT),
            ]);
            return back()->with('success', 'You have changed your password');

        } else
        {
            return back()->withErrors(['old_password' => 'Make sure you fill your current password']);
        }
        
    }
}
