@extends('layouts.user-layout')

@section('title', 'Beranda')

@section('style')
    <style>
        /* Hero Section Styles */
        .hero-section {
            position: relative;
            height: 60vh;
            background: url('{{ asset('assets/img/hero-bg.jpg') }}') center center / cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .cta-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .cta-button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Description Section */
        .description-section {
            padding: 3rem 1rem;
            background-color: #f8f9fa;
        }

        .description-container {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .logo {
            max-width: 150px;
        }

        /* Features Section */
        .features-section {
            padding: 3rem 1rem;
            background-color: #fff;
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
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="text-white">EverFlow Monitoring Power Generator</h1>
            <p>EverFlow Monitoring Power Generator adalah Website canggih yang dirancang untuk mempromosikan dan menampilkan
                hasil karya inovatif kami dalam pembuatan alat Power generator.</p>
            <button class="cta-button">The Walker: EverFlow Team</button>
        </div>
    </section>

    <!-- Profile Section -->
    <section class="description-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="description-container">
                        <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="EverFlow Logo" class="logo">
                        <div class="description-text">
                            <h2 class="text-primary">Deskripsi</h2>
                            <p>Pendulum Power Generator adalah sebuah teknologi inovatif yang mengkonversi energi mekanik
                                yang dihasilkan dari gerakan pendulum menjadi tenaga listrik yang berkelanjutan. Teknologi
                                ini memanfaatkan prinsip dasar fisika, di mana gerakan osilasi pendulum yang dipengaruhi
                                oleh gaya gravitasi diubah menjadi energi kinetik, yang kemudian dialirkan ke sistem
                                transmisi untuk dikonversi menjadi energi listrik.</p>
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
    <script>
        document.querySelector('.cta-button').addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#0056b3';
            this.style.transform = 'scale(1.1)';
        });

        document.querySelector('.cta-button').addEventListener('mouseleave', function() {
            this.style.backgroundColor = '#007bff';
            this.style.transform = 'scale(1)';
        });
    </script>
@endsection
