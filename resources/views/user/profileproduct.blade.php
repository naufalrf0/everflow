@extends('layouts.user-layout')

@section('title', 'Profil Produk')

@section('style')
<style>
    .header {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 2rem 1rem;
    }

    .title {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .subtitle {
        font-size: 1.3rem;
        font-weight: 300;
    }

    .description-section {
        padding: 3rem 1rem;
        background-color: #f8f9fa;
    }

    .description-container {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .logo {
        max-width: 150px;
    }

    .features-section {
        padding: 3rem 1rem;
        background-color: #f8f9fa;
    }

    .feature-card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .feature-card h4 {
        color: #007bff;
        font-weight: bold;
    }

    .feature-card p {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .feature-card .icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #007bff;
    }

    @media (max-width: 768px) {
        .description-container {
            flex-direction: column;
            text-align: center;
        }

        .features-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .feature-card {
            width: 90%;
        }
    }
</style>
@endsection

@section('content')
     <!-- Header Section -->
     <header class="header">
        <h1 class="title text-white">⚡ Pendulum Power Generator</h1>
        <p class="subtitle">Teknologi Konversi Energi Inovatif & Ramah Lingkungan</p>
    </header>

    <!-- Description Section -->
    <section class="description-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="description-container">
                        <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="EverFlow Logo" class="logo">
                        <div class="description-text">
                            <h2 class="text-primary">Deskripsi</h2>
                            <p>Pendulum Power Generator adalah sebuah teknologi inovatif yang mengkonversi energi mekanik yang dihasilkan dari gerakan pendulum menjadi tenaga listrik yang berkelanjutan. Teknologi ini memanfaatkan prinsip dasar fisika, di mana gerakan osilasi pendulum yang dipengaruhi oleh gaya gravitasi diubah menjadi energi kinetik, yang kemudian dialirkan ke sistem transmisi untuk dikonversi menjadi energi listrik.</p>
                            <h3 class="text-primary">Fungsi Utama:</h3>
                            <ul class="list-unstyled">
                                <li>⚙️ Konversi Energi Mekanik ke Energi Listrik.</li>
                                <li>⚡ Penyediaan Daya Listrik Ramah Lingkungan.</li>
                                <li>🔄 Pemanfaatan Gerakan Pendulum yang Konsisten untuk Kestabilan Energi.</li>
                                <li>🔋 Optimisasi Proses Konversi Energi melalui Komponen Penyimpan Daya.</li>
                                <li>🌍 Pemanfaatan Prinsip Gravitasi untuk Sumber Energi Berkelanjutan.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <span class="icon">⚙️</span>
                        <h4>Powerful Performance</h4>
                        <p>Engineered to deliver high-speed performance for intensive tasks.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <span class="icon">🔒</span>
                        <h4>Secure & Reliable</h4>
                        <p>Top-notch security features to keep your data safe and secure.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <span class="icon">🌍</span>
                        <h4>Eco-Friendly</h4>
                        <p>Designed with sustainability in mind, reducing environmental impact.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/js/profileproduct.js') }}"></script>
@endsection
