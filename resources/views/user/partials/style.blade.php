
    <style>
        /* Navbar Styling */
        .navbar {
            background-color: #0d1b2a;
            padding: 0.75rem 1.5rem;
        }

        .logo {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .nav-links {
            gap: 1rem;
        }

        .nav-btn {
            background-color: #1d3557;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .nav-btn:hover {
            background-color: #457b9d;
        }

        /* Login Button */
        .login-btn {
            background-color: #007bff;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('{{ asset('assets/img/bandul-pendulum.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
            color: #fff;
            text-align: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            padding: 20px;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .cta-button {
            background-color: #007bff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Notification Box */
        .notification-box {
            display: none;
            position: absolute;
            top: 70px;
            right: 20px;
            width: 300px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 1000;
            color: #000;
            padding: 1rem;
        }

        .notification-box p {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .notification-box ul {
            padding-left: 0;
            list-style: none;
        }

        .notification-box ul li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 1.5s ease;
        }

        footer {
        text-align: center;
        padding: 1rem;
        background-color: #343a40;
        color: white;
        font-size: 0.9rem;
    }
    </style>