<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountType;

class AccountTypeController extends Controller
{
    public function index()
    {
        $accountTypes = AccountType::all();
        return view('auth.jenis-accounts.index', compact('accountTypes'));
    }

    public function create()
    {
        return view('auth.jenis-accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'keterangan' => 'string|nullable',
        ]);

        AccountType::create([
            'name' => $request->input('name'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect()->route('account-types.index')->with('success', 'Jenis akun baru berhasil dibuat.');
    }

    public function edit(AccountType $accountType)
    {
        return view('auth.jenis-accounts.edit', compact('accountType'));
    }

    public function update(Request $request, AccountType $accountType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'keterangan' => 'string|nullable',
        ]);

        $accountType->update([
            'name' => $request->input('name'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect()->route('account-types.index')->with('success', 'Data jenis akun berhasil diperbarui.');
    }

    public function destroy(AccountType $accountType)
    {
        $accountType->delete();
        return redirect()->route('account-types.index')->with('success', 'Jenis akun berhasil dihapus.');
    }
}
