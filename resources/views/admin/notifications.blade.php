@extends('layouts.admin-layout')

@section('title', 'Notifikasi')
@section('page-title', 'Notifikasi')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white">Notifikasi Alat</h5>
            </div>
            <div class="card-body">
                @php
                    $notifications = \App\Models\Notifikasi::latest()->get();
                @endphp
                @if ($notifications->isEmpty())
                    <div class="text-center">
                        <p class="text-muted">Anda tidak memiliki notifikasi apapun.</p>
                    </div>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($notifications as $notification)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $notification->deskripsi }}</div>
                                    <small class="text-muted">
                                        {{ $notification->created_at->translatedFormat('l, d F Y - H:i') }}
                                    </small>
                                </div>
                                <span class="badge bg-secondary rounded-pill">
                                    {{ $notification->bandul->voltase_baterai ?? '-' }} V
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
