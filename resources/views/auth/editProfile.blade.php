@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old('name') ?? $user->name }}" id="name" class="form-control">
            @error('name')
            <div class="nt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email') ?? $user->email }}" id="email" class="form-control">
            @error('email')
            <div class="nt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="{{old('username') ?? $user->username }}" id="username" class="form-control">
            @error('username')
            <div class="nt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>


        <!-- <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password"  id="password" class="form-control">
            @error('password')
            <div class="nt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control">
            @error('password_confirmation')
            <div class="nt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div> -->
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection