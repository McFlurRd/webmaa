@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 20px;">Hasil Pencarian</h2>

    
    <h4><u>Akun</u></h4>
    
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

    <h4><u>Jenis Akun</u></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accountTypes as $accountType)
            <tr>
                <td>{{ $accountType->name }}</td>
                <td>{{ $accountType->keterangan }}</td>
                <td>
                    <a href="{{ route('account-types.edit', $accountType) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('account-types.destroy', $accountType) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jenis akun ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection