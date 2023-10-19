@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Jenis Akun</h2>
    <a href="{{ route('account-types.create') }}" class="btn btn-primary">Buat Jenis Akun</a>

    <form method="get" action="{{ route('account-types.index') }}" class="form-inline float-right">
        <div class="form-group">
            <label for="sort" class="mr-2">Sort By:</label>
            <select name="sort" id="sort" class="form-control mr-2">
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama</option>
                <option value="keterangan" {{ request('sort') == 'keterangan' ? 'selected' : '' }}>Keterangan</option>
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
