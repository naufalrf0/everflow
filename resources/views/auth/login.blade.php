@extends('layouts.auth-layout')

@section('title', 'Masuk - Everflow')

@section('form-sign-in')
    <h2>Masuk</h2>
    <div class="social-icons">
        <i class="icon">🔒</i>
        <i class="icon">💼</i>
        <i class="icon">🌐</i>
    </div>
    <p>Masuk menggunakan alamat E-Mail</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="Password" required>
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <a href="{{ route('password.request') }}" class="forgot-password">Lupa password?</a>
        <button type="submit" class="sign-in-btn">Masuk</button>
    </form>
@endsection

@section('form-sign-up')
    <div class="form-container sign-up">
        <h2>Daftar Akun!</h2>
        <p>Daftar jika Anda belum memiliki akun ...</p>
        <button class="sign-up-btn" onclick="goToRegister()">Daftar</button>
    </div>
@endsection
