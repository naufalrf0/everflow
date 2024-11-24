<style>
    /* General Reset */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    
    /* Navbar Styling */
    .navbar {
        background-color: #ffffff; /* Consistent white background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for separation */
        padding: 0.75rem 1.5rem;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    
    /* Logo Styling */
    .navbar-brand {
        font-size: 1.8rem;
        font-weight: bold;
        color: #007bff; /* Blue logo */
    }
    
    /* Navigation Links */
    .nav-link {
        color: black; /* Black text for links */
        transition: color 0.3s ease;
    }
    
    .nav-link:hover {
        color: #007bff; /* Blue hover effect */
        text-decoration: underline;
    }
    
    /* Navbar Toggler */
    .navbar-toggler {
        border: none;
    }
    
    .navbar-toggler-icon {
        filter: none; /* Consistent black toggler icon */
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
    
    </style>
    