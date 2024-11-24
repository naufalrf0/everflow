@extends('layouts.admin-layout')

@section('title', 'Manajemen Data Bandul')
@section('page-title', 'Manajemen Data Bandul')

@section('content')
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBandulModal">Tambah Data Bandul</button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Voltase Baterai</th>
                <th>Kecepatan Bandul (RPM)</th>
                <th>Total Daya (KW)</th>
                <th>Hasil Daya (KW)</th>
                <th>Waktu Kinerja</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($banduls as $bandul)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bandul->voltase_baterai }} V</td>
                    <td>{{ $bandul->kecepatan_bandul }} RPM</td>
                    <td>{{ $bandul->total_daya }} KW</td>
                    <td>{{ $bandul->hasil_daya }} KW</td>
                    <td>{{ \Carbon\Carbon::parse($bandul->waktu_kinerja_bandul)->translatedFormat('l, d F Y H:i') }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editBandulModal{{ $bandul->id }}">Edit</button>

                        <!-- Delete Button -->
                        <form action="{{ route('bandul-management.destroy', $bandul->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data Bandul.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addBandulModal" tabindex="-1" aria-labelledby="addBandulLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('bandul-management.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBandulLabel">Tambah Data Bandul</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="voltase_baterai">Voltase Baterai (V)</label>
                            <input type="number" class="form-control" name="voltase_baterai" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="kecepatan_bandul">Kecepatan Bandul (RPM)</label>
                            <input type="number" class="form-control" name="kecepatan_bandul" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="total_daya">Total Daya (KW)</label>
                            <input type="number" class="form-control" name="total_daya" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="hasil_daya">Hasil Daya (KW)</label>
                            <input type="number" class="form-control" name="hasil_daya" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="waktu_kinerja_bandul">Waktu Kinerja</label>
                            <input type="datetime-local" class="form-control" name="waktu_kinerja_bandul" required>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach ($banduls as $bandul)
        <div class="modal fade" id="editBandulModal{{ $bandul->id }}" tabindex="-1"
            aria-labelledby="editBandulLabel{{ $bandul->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('bandul-management.update', $bandul->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editBandulLabel{{ $bandul->id }}">Edit Data Bandul</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="voltase_baterai">Voltase Baterai (V)</label>
                                <input type="number" class="form-control" name="voltase_baterai"
                                    value="{{ $bandul->voltase_baterai }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="kecepatan_bandul">Kecepatan Bandul (RPM)</label>
                                <input type="number" class="form-control" name="kecepatan_bandul"
                                    value="{{ $bandul->kecepatan_bandul }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="total_daya">Total Daya (KW)</label>
                                <input type="number" class="form-control" name="total_daya"
                                    value="{{ $bandul->total_daya }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="hasil_daya">Hasil Daya (KW)</label>
                                <input type="number" class="form-control" name="hasil_daya"
                                    value="{{ $bandul->hasil_daya }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="waktu_kinerja_bandul">Waktu Kinerja</label>
                                <input type="datetime-local" class="form-control" name="waktu_kinerja_bandul"
                                    value="{{ \Carbon\Carbon::parse($bandul->waktu_kinerja_bandul)->format('Y-m-d\TH:i') }}"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
