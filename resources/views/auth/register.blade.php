@extends('layouts.auth-layout')

@section('title', 'Daftar - Everflow')
@section('description', 'Sign up if you still don’t have an account ...')

@section('form-sign-in')
    <h2>Daftar</h2>
    <div class="social-icons">
        <i class="icon">🔒</i>
        <i class="icon">💼</i>
        <i class="icon">🌐</i>
    </div>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
        @error('name')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <input type="password" name="password" placeholder="Password" required>
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button type="submit" class="sign-in-btn">Daftar</button>
    </form>
@endsection

@section('form-sign-up')
<div class="form-container sign-up">
    <h2>Masuk</h2>
    <p>Masuk jika Anda sudah memiliki akun ...</p>
    <button class="sign-up-btn" onclick="goToLogin()">Masuk</button>
</div>
@endsection
