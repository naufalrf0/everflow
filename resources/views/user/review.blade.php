@extends('layouts.user-layout')

@section('title', 'Review')

@section('style')
    <style>
        /* Reset default styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #e8f1f9;
            color: #333;
        }

        .review-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }

        header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        header .logo {
            max-width: 80px;
            margin-bottom: 10px;
        }

        header h1 {
            font-size: 1.8rem;
            color: #0066cc;
        }

        header p {
            font-size: 1rem;
            color: #555;
        }

        .review-form {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .review-form h2 {
            color: #0066cc;
            margin-bottom: 10px;
        }

        .review-form input,
        .review-form textarea,
        .review-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1em;
        }

        .review-form button {
            background-color: #0066cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .review-form button:hover {
            background-color: #005bb5;
        }

        .reviews {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .review {
            background-color: #f1f7ff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .review .user-image {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 8px;
            border: 2px solid #ddd;
        }

        .review h3 {
            color: #333;
            margin-bottom: 5px;
        }

        .review .rating {
            color: #ffcc00;
            font-size: 1.2em;
            margin-bottom: 8px;
        }

        .review p {
            color: #555;
            font-size: 0.9em;
        }
    </style>
@endsection

@section('content')
    <div class="review-container">
        <header>
            <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="EverFlow Logo" class="logo">
            <h1>EverFlow Power Generator</h1>
            <p>Advanced technology for energy efficiency and durability.</p>
        </header>

        @auth
            <section class="review-form">
                <h2>Ulasan Pengguna</h2>
                <form id="reviewForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                    <textarea id="reviewText" name="isi_komentar" placeholder="Bagikan pengalaman Anda tentang produk ini..." required></textarea>
                    <select id="rating" name="rating" required>
                        <option value="">Pilih rating</option>
                        <option value="⭐">⭐ 1 - Poor</option>
                        <option value="⭐⭐">⭐⭐ 2 - Fair</option>
                        <option value="⭐⭐⭐">⭐⭐⭐ 3 - Good</option>
                        <option value="⭐⭐⭐⭐">⭐⭐⭐⭐ 4 - Very Good</option>
                        <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐ 5 - Excellent</option>
                    </select>
                    <input type="file" id="profileImage" name="profile_image" accept="image/*">
                    <button type="submit">Kirim Ulasan</button>
                </form>
            </section>
        @else
            <div class="alert alert-warning">
                Anda harus <a href="{{ route('login') }}">login</a> untuk memberikan ulasan.
            </div>
        @endauth

        <section class="reviews" id="reviewsSection">
            <h3>Ulasan Terbaru</h3>
            @if ($reviews->isEmpty())
                <p>Tidak ada ulasan untuk ditampilkan.</p>
            @else
                @foreach ($reviews as $review)
                    <div class="review">
                        <img src="{{ asset('storage/profile_images/' . $review->profile_image) }}" alt="User Image" class="user-image">

                        <div>
                            <h3>{{ $review->customer->name }}</h3>
                            <div class="rating">
                                @for ($i = 0; $i < $review->jumlah_like; $i++)
                                    ⭐
                                @endfor
                            </div>
                            <p>{{ $review->isi_komentar }}</p>
                        </div>
                    </div>
                @endforeach

                {{ $reviews->links() }}
            @endif
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reviewForm = document.getElementById('reviewForm');

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

                    if (!response.ok) throw new Error('Gagal menyimpan ulasan.');

                    const data = await response.json();
                    if (data.success) {
                        alert('Ulasan berhasil ditambahkan!');
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan.');
                }
            });
        });
    </script>
@endsection
