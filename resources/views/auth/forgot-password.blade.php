@extends('layouts.auth-layout')

@section('title', 'Forgot Password')
@section('description', 'Enter your email to reset your password.')

@section('form-sign-in')
<div class="form-box">
    <h2>Lupa Password</h2>
    <p>Masukkan email anda untuk mereset password.</p>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" class="sign-in-btn">Send Reset Link</button>
    </form>
</form>

</div>
@endsection

@section('form-sign-up')
<!-- Optional: Additional form or button for different purposes -->
@endsection
