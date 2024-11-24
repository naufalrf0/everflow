@extends('layouts.admin-layout')

@section('title', 'Manajemen Komentar')
@section('page-title', 'Manajemen Komentar')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white">Manajemen Komentar</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pengguna</th>
                            <th>Komentar</th>
                            <th>Rating</th>
                            <th>Bandul</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($komentars as $komentar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $komentar->profile_image_url }}" alt="Avatar" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    {{ $komentar->user->name ?? 'Guest' }}
                                </td>
                                <td>{{ Str::limit($komentar->review, 50) }}</td>
                                <td>{{ $komentar->rating }}/5</td>
                                <td>{{ $komentar->bandul->voltase_baterai }} V - {{ $komentar->bandul->kecepatan_bandul }} RPM</td>
                                <td>
                                    @if ($komentar->is_approved)
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-warning">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Approve Button -->
                                    @if (!$komentar->is_approved)
                                        <form action="{{ route('review-management.approve', $komentar->komentar_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                        </form>
                                    @endif

                                    <!-- Reject Button -->
                                    <form action="{{ route('review-management.reject', $komentar->komentar_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>

                                    <!-- View Button -->
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewCommentModal{{ $komentar->komentar_id }}">
                                        Lihat
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal for Viewing Comment -->
                            <div class="modal fade" id="viewCommentModal{{ $komentar->komentar_id }}" tabindex="-1"
                                aria-labelledby="viewCommentModalLabel{{ $komentar->komentar_id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewCommentModalLabel{{ $komentar->komentar_id }}">
                                                Detail Komentar
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nama Pengguna:</strong> {{ $komentar->user->name ?? 'Guest' }}</p>
                                            <p><strong>Bandul:</strong> {{ $komentar->bandul->voltase_baterai }} V - {{ $komentar->bandul->kecepatan_bandul }} RPM</p>
                                            <p><strong>Rating:</strong> {{ $komentar->rating }}/5</p>
                                            <p><strong>Komentar:</strong></p>
                                            <p>{{ $komentar->review }}</p>
                                            <p><strong>Status:</strong>
                                                @if ($komentar->is_approved)
                                                    <span class="badge bg-success">Disetujui</span>
                                                @else
                                                    <span class="badge bg-warning">Menunggu</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada komentar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
