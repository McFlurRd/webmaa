@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Akun</h2>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Buat Akun</a>

    <form method="get" action="{{ route('accounts.index') }}" class="form-inline float-right">
        <div class="form-group">
            <label for="sort" class="mr-2">Sort By:</label>
            <select name="sort" id="sort" class="form-control mr-2">
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama</option>
                <option value="username" {{ request('sort') == 'username' ? 'selected' : '' }}>Username</option>
                <option value="email" {{ request('sort') == 'email' ? 'selected' : '' }}>Email</option>
                <option value="url" {{ request('sort') == 'url' ? 'selected' : '' }}>Url</option>
                <option value="keterangan" {{ request('sort') == 'keterangan' ? 'selected' : '' }}>Keterangan</option>
                <option value="jenis_account_id" {{ request('sort') == 'jenis_account_id' ? 'selected' : '' }}>Jenis Akun</option>
            </select>
        </div>
        <div class="form-group">
            <label for="direction" class="mr-2">Arah Urutan:</label>
            <select name="direction" id="direction" class="form-control mr-2">
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>A-Z</option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Z-A</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>URL</th>
                <th>Keterangan</th>
                <th>Jenis Akun</th>
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
                    @can('update', $account)
                    <a href="{{ route('accounts.edit', $account) }}" class="btn btn-primary">Edit</a>
                    @endcan

                    @can('delete', $account)
                    <form action="{{ route('accounts.destroy', $account) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
