<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountType;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $accounts = Account::orderBy($sortField, $sortDirection)->get();
        return view('auth.accounts.index', compact('accounts'));
    }


    public function create()
    {
        $accountTypes = AccountType::all();
        return view('auth.accounts.create', compact('accountTypes'));
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'string|max:255|nullable',
            'email' => 'email|max:255|nullable',
            'password' => 'required|string',
            'url' => 'string|nullable',
            'keterangan' => 'string|nullable',
            'jenis_account_id' => 'integer',
        ]);

        $account = new Account([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'url' => $request->input('url'),
            'keterangan' => $request->input('keterangan'),
            'jenis_account_id' => $request->input('jenis_account_id'),
            'user_id' => $user_id,
        ]);

        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Akun baru berhasil dibuat.');
    }

    public function edit(Account $account)
    {
        $accountTypes = AccountType::all(); // Mengambil semua jenis akun
        return view('auth.accounts.edit', compact('account', 'accountTypes'));
    }


    public function update(Request $request, Account $account)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'string|max:255|nullable',
            'email' => 'email|max:255|nullable',
            'url' => 'string|nullable',
            'keterangan' => 'string|nullable',
            'jenis_account_id' => 'integer',
        ]);

        // Periksa apakah ada kata sandi baru yang diinputkan
        if ($request->filled('new_password')) {
            $newPassword = bcrypt($request->input('new_password'));
        } else {
            $newPassword = $account->password; // Gunakan kata sandi yang sudah ada
        }

        // Update the attributes of the existing $account model.
        $account->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $newPassword,
            'url' => $request->input('url'),
            'keterangan' => $request->input('keterangan'),
            'jenis_account_id' => $request->input('jenis_account_id'),
        ]);


        // Save the changes to the database.
        return redirect()->route('accounts.index')->with('success', 'Data akun berhasil diperbarui.');
    }


    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dihapus.');
    }
}
