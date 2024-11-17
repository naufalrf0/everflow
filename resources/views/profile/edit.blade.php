@extends('layouts.admin-layout')

@section('title', 'Edit Profil')

@section('content')

    <h1>Edit Profil</h1>

    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success mt-2">Profil berhasil diperbarui.</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('patch')

        <div class="form-group mt-2">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" required>

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>

    </form>

    <!-- Tombol Hapus Akun -->
    <hr>
    <div class="mt-4">
        <h3>Hapus Akun</h3>
        <p>Setelah akun dihapus, semua sumber daya dan data Anda akan dihapus secara permanen. Sebelum menghapus akun Anda,
            harap unduh data atau informasi apa pun yang ingin Anda simpan.</p>

        <!-- Tombol untuk memicu modal hapus akun -->
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Hapus Akun</button>
    </div>
    </div>

    <!-- Modal Hapus Akun -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Konfirmasi Hapus Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus akun Anda? Semua data akan dihapus secara permanen. Masukkan
                            password Anda untuk mengkonfirmasi.</p>
                        <div class="form-group">
                            <label for="password">Password</label>
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


    @endsection
