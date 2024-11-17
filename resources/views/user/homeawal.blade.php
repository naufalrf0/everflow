@extends('layouts.user-layout')

@section('title', 'Beranda')

@section('content')
<div class="notification-box" id="notificationBox">
    <p><strong>Notifikasi</strong></p>
    <ul>
        <li>Pemberitahuan 1</li>
        <li>Pemberitahuan 2</li>
        <li>Pemberitahuan 3</li>
    </ul>
</div>

<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="text-white">EverFlow Monitoring Power Generator</h1>
        <p>EverFlow Monitoring Power Generator adalah Website canggih yang dirancang untuk mempromosikan dan menampilkan hasil karya inovatif kami dalam pembuatan alat Power generator.</p>
        <button class="cta-button">The Walker: EverFlow Team</button>
    </div>
</section>
@endsection

@section('script')
    <script>
        function toggleNotificationBox() {
            const notificationBox = document.getElementById('notificationBox');
            notificationBox.style.display = (notificationBox.style.display === 'none' || notificationBox.style.display === '') ? 'block' : 'none';
        }

        document.addEventListener('click', function(event) {
            const notificationBox = document.getElementById('notificationBox');
            const isClickInside = notificationBox.contains(event.target) || event.target.closest('.nav-btn');
            if (!isClickInside) {
                notificationBox.style.display = 'none';
            }
        });

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
