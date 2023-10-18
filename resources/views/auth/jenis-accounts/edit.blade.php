@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jenis Akun</h2>

    <form method="POST" action="{{ route('account-types.update', $accountType) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $accountType->name }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ $accountType->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
