<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountType;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $accounts = Account::where('name', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('url', 'like', '%' . $search . '%')
            ->orWhere('keterangan', 'like', '%' . $search . '%')
            ->orWhereHas('accountType', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();

        $accountTypes = AccountType::where('name', 'like', '%' . $search . '%')
            ->orWhere('keterangan', 'like', '%' . $search . '%')
            ->get();

        return view('search', compact('accounts', 'accountTypes'));
    }
}
