@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Akun</h2>

    <form method="POST" action="{{ route('accounts.update', $account) }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="account_id" value="{{ $account->id }}">

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $account->name }}" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $account->username }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $account->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ $account->password }}" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ $account->url }}">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ $account->keterangan }}</textarea>
        </div>
        <div class="form-group">
            <label for="jenis_account_id">Jenis Akun</label>
            <select name="jenis_account_id" id="jenis_account_id" class="form-control">
                <option value="" {{ is_null($account->jenis_account_id) ? 'selected' : '' }}>Pilih Jenis Akun</option>
                @foreach($accountTypes as $accountType)
                <option value="{{ $accountType->id }}" {{ $account->jenis_account_id == $accountType->id ? 'selected' : '' }}>
                    {{ $accountType->name }}
                </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection