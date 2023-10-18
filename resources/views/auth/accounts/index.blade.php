@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Akun</h2>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Buat Akun</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>URL</th>
                <th>Keterangan</th>
                <th>Jenis Akun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ $account->url }}</td>
                    <td>{{ $account->keterangan }}</td>
                    <td>{{ $account->accountType->name }}</td>
                    <td>
                        <a href="{{ route('accounts.edit', $account) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('accounts.destroy', $account) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
