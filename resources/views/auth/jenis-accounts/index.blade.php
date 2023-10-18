@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Jenis Akun</h2>
    <a href="{{ route('account-types.create') }}" class="btn btn-primary">Buat Jenis Akun</a>

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
