@extends('layouts.admin-layout')

@section('title', 'Edit Profil')
@section('page-title', 'Edit Profil')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white">Edit Profil</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif

                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success mt-2">Profil berhasil diperbarui.</div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('patch')

                    <!-- Name Input -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Account Section -->
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0 text-white">Hapus Akun</h5>
            </div>
            <div class="card-body">
                <p class="text-danger">
                    Setelah akun dihapus, semua sumber daya dan data Anda akan dihapus secara permanen.
                    Harap unduh data penting sebelum melanjutkan.
                </p>
                <div class="text-end">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        Hapus Akun
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title text-white" id="deleteAccountModalLabel">Konfirmasi Hapus Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">
                            Apakah Anda yakin ingin menghapus akun Anda? Semua data akan dihapus secara permanen.
                            Masukkan password Anda untuk mengkonfirmasi.
                        </p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror" required>
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
