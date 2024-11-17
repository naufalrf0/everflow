@extends('layouts.admin-layout')

@section('title', 'Data Bandul')
@section('page-title', 'Data Bandul')

@section('content')

<div class="mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBandulModal">Tambah Data Bandul</button>
</div>

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
        @foreach($banduls as $bandul)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bandul->voltase_baterai }} V</td>
                <td>{{ $bandul->kecepatan_bandul }} RPM</td>
                <td>{{ $bandul->total_daya }} KW</td>
                <td>{{ $bandul->hasil_daya }} KW</td>
                <td>{{ $bandul->waktu_kinerja_bandul->format('d-m-Y H:i') }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBandulModal{{ $bandul->bandul_id }}">Edit</button>
                    <form action="{{ route('bandul-management.destroy', $bandul->bandul_id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm delete-button" type="button">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modals -->
@foreach($banduls as $bandul)
    <!-- Modal Edit -->
    <div class="modal fade" id="editBandulModal{{ $bandul->bandul_id }}" tabindex="-1" aria-labelledby="editBandulLabel{{ $bandul->bandul_id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('bandul-management.update', $bandul->bandul_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBandulLabel{{ $bandul->bandul_id }}">Edit Data Bandul</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="form-group">
                            <label for="voltase_baterai">Voltase Baterai (V)</label>
                            <input type="number" class="form-control" name="voltase_baterai" value="{{ $bandul->voltase_baterai }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kecepatan_bandul">Kecepatan Bandul (RPM)</label>
                            <input type="number" class="form-control" name="kecepatan_bandul" value="{{ $bandul->kecepatan_bandul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="total_daya">Total Daya (KW)</label>
                            <input type="number" class="form-control" name="total_daya" value="{{ $bandul->total_daya }}" required>
                        </div>
                        <div class="form-group">
                            <label for="hasil_daya">Hasil Daya (KW)</label>
                            <input type="number" class="form-control" name="hasil_daya" value="{{ $bandul->hasil_daya }}" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_kinerja_bandul">Waktu Kinerja</label>
                            <input type="datetime-local" class="form-control" name="waktu_kinerja_bandul" value="{{ $bandul->waktu_kinerja_bandul->format('Y-m-d\TH:i') }}" required>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

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
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="voltase_baterai">Voltase Baterai (V)</label>
                        <input type="number" class="form-control" name="voltase_baterai" required>
                    </div>
                    <div class="form-group">
                        <label for="kecepatan_bandul">Kecepatan Bandul (RPM)</label>
                        <input type="number" class="form-control" name="kecepatan_bandul" required>
                    </div>
                    <div class="form-group">
                        <label for="total_daya">Total Daya (KW)</label>
                        <input type="number" class="form-control" name="total_daya" required>
                    </div>
                    <div class="form-group">
                        <label for="hasil_daya">Hasil Daya (KW)</label>
                        <input type="number" class="form-control" name="hasil_daya" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_kinerja_bandul">Waktu Kinerja</label>
                        <input type="datetime-local" class="form-control" name="waktu_kinerja_bandul" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah form submit langsung
                var form = button.closest('form');
                Swal.fire({
                    title: 'Yakin ingin menghapus data ini?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Dibatalkan',
                            'Data tidak jadi dihapus',
                            'error'
                        );
                    }
                });
            });
        });
    });
</script>

@endsection
