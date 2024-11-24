@extends('layouts.user-layout')

@section('title', 'Ulasan Pengguna')

@section('style')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .review-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        header {
            text-align: center;
            padding: 48px;
            border-bottom: 1px solid #e0e0e0;
        }

        header .logo {
            max-width: 80px;
            margin-bottom: 10px;
        }

        header h1 {
            font-size: 2rem;
            color: #007bff;
        }

        header p {
            color: #6c757d;
        }

        .review-form {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .review {
            background-color: #e9ecef;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .review .user-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }

        .review h3 {
            color: #343a40;
        }

        .review .rating {
            color: #ffc107;
        }
    </style>
@endsection

@section('content-center')
    <div class="review-container">
        <!-- Header Section -->
        <header>
            <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="Logo EverFlow" class="logo">
            <h1>Ulasan Produk EverFlow</h1>
            <p>Teknologi canggih untuk efisiensi energi dan daya tahan.</p>
        </header>

        <!-- Review Form for Authenticated Users -->
        @auth
            <section class="review-form">
                <h2 class="text-primary">Berikan Ulasan Anda</h2>
                <form id="reviewForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bandul_id" value="1">

                    <div class="mb-3">
                        <textarea name="review" class="form-control" rows="4" placeholder="Bagikan pengalaman Anda dengan produk ini..."
                            required></textarea>
                    </div>

                    <div class="mb-3">
                        <select name="rating" class="form-select" required>
                            <option value="">Pilih Penilaian</option>
                            <option value="1">⭐ 1 - Buruk</option>
                            <option value="2">⭐⭐ 2 - Kurang</option>
                            <option value="3">⭐⭐⭐ 3 - Cukup</option>
                            <option value="4">⭐⭐⭐⭐ 4 - Bagus</option>
                            <option value="5">⭐⭐⭐⭐⭐ 5 - Sangat Bagus</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Unggah Foto Profil (opsional)</label>
                        <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
                </form>
            </section>
        @else
            <div class="alert alert-warning mt-4">
                Anda harus <a href="{{ route('login') }}" class="text-primary">login</a> untuk mengirimkan ulasan.
            </div>
        @endauth

        <!-- Reviews Section -->
        <section class="reviews">
            <h3 class="text-primary mt-4">Ulasan Terbaru</h3>
            @forelse ($reviews as $review)
                <div class="review">
                    <img src="{{ $review->profile_image ? asset('storage/' . $review->profile_image) : asset('assets/img/default-user.png') }}"
                        alt="Foto Pengguna" class="user-image">
                    <div>
                        <h3>{{ $review->user->name }}</h3>
                        <div class="rating">{{ str_repeat('⭐', $review->rating) }}</div>
                        <p>{{ $review->review }}</p>
                    </div>
                </div>
            @empty
                <p>Belum ada ulasan untuk ditampilkan.</p>
            @endforelse

            <!-- Pagination -->
            <div class="mt-4">
                {{ $reviews->links('pagination::bootstrap-4') }}
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('dynamicNavbar');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            const reviewForm = document.getElementById('reviewForm');

            if (reviewForm) {
                reviewForm.addEventListener('submit', async function(event) {
                    event.preventDefault();

                    const formData = new FormData(reviewForm);

                    try {
                        const response = await fetch("{{ route('reviews.store') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData,
                        });

                        if (!response.ok) throw new Error('Gagal mengirim ulasan.');

                        const data = await response.json();
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Ulasan Anda berhasil dikirim dan menunggu persetujuan!',
                                confirmButtonText: 'OK',
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Kesalahan!',
                                text: 'Terjadi kesalahan saat mengirim ulasan.',
                                confirmButtonText: 'OK',
                            });
                        }
                    } catch (error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan!',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                            confirmButtonText: 'OK',
                        });
                    }
                });
            }
        });
    </script>
@endsection
