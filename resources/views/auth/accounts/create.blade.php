@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Account</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('accounts.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="jenis_account_id">Jenis Akun</label>
            <select name="jenis_account_id" id="jenis_account_id" class="form-control">
                <!-- Masukkan opsi jenis akun di sini, misalnya menggunakan foreach loop -->
                @foreach($accountTypes as $accountType)
                    <option value="{{ $accountType->id }}">{{ $accountType->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Create Account</button>
    </form>
</div>
@endsection
