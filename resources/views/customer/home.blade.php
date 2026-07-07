@extends('customer.layouts.master')

@section('content')
    <!-- CSS Custom Styles for Premium Look -->
    <style>
        :root {
            --primary-color: #79AC24;
            --primary-hover: #68931E;
            --dark-color: #2b363c;
            --light-bg: #f8f9fa;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=1600&q=80') no-repeat center center;
            background-size: cover;
            height: 75vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            margin-top: 100px; /* To prevent overlap with fixed navbar */
        }

        .hero-title {
            font-family: 'Raleway', sans-serif;
            font-size: 4.5rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            color: #fff !important;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #d9f99d; /* Light green-yellow */
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .btn-pesan {
            background-color: var(--primary-color);
            color: #fff;
            padding: 12px 36px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 30px;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(121, 172, 36, 0.4);
        }

        .btn-pesan:hover {
            background-color: var(--primary-hover);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(121, 172, 36, 0.6);
        }

        /* Feature Cards */
        .feature-card {
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 16px;
            transition: all 0.3s ease;
            background: #fff;
            padding: 30px 20px;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .feature-icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 50px;
            background-color: rgba(121, 172, 36, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            border: 1px solid rgba(121, 172, 36, 0.2);
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon-wrapper {
            background-color: var(--primary-color);
        }

        .feature-card:hover .feature-icon-wrapper i {
            color: #fff !important;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .feature-desc {
            font-size: 0.95rem;
            color: #6c757d;
            line-height: 1.6;
        }

        /* Menu Card Custom */
        .menu-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.03);
            overflow: hidden;
            background: #fff;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .menu-img-wrapper {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-card:hover .menu-img {
            transform: scale(1.08);
        }

        .menu-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--primary-color);
            color: #fff;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 5px 12px;
            border-radius: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .menu-body {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .menu-meta {
            font-size: 0.85rem;
            color: #8892b0;
            margin-bottom: 12px;
        }

        .menu-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .menu-desc {
            font-size: 0.9rem;
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 4.8em;
        }

        .menu-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 15px;
        }

        .menu-price {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark-color);
        }

        .btn-pesan-sm {
            background-color: var(--primary-color);
            color: #fff;
            padding: 8px 18px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 30px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-pesan-sm:hover {
            background-color: var(--primary-hover);
            color: #fff;
        }

        /* Testimonial Cards */
        .testimonial-card {
            border: none;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            padding: 30px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        }

        .stars-wrapper {
            color: #fbbf24; /* yellow-400 */
            margin-bottom: 15px;
        }

        .quote-text {
            font-size: 0.95rem;
            color: #4b5563;
            font-style: italic;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .client-info {
            display: flex;
            align-items: center;
        }

        .client-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 2px solid rgba(121, 172, 36, 0.2);
        }

        .client-name {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 0.95rem;
            margin: 0;
        }

        .client-status {
            font-size: 0.8rem;
            color: #8892b0;
        }

        /* Toast Container */
        .toast-container-custom {
            position: fixed;
            top: 120px;
            right: 30px;
            z-index: 10000;
        }

        .toast-custom {
            background-color: #334155;
            color: #fff;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 300px;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .toast-custom.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast-icon {
            background-color: var(--primary-color);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.85rem;
        }
    </style>

    <!-- 1. Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="hero-title mb-3">Cita Rasa Nusantara</h1>
                    <p class="hero-subtitle">Hidangan tradisional higienis, segar, dan dibuat dengan cinta.</p>
                    <a href="{{ route('menu') }}" class="btn btn-pesan">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Welcome Section -->
    <div class="container py-5 mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4" style="color: var(--dark-color); font-size: 2.5rem;">
                    Selamat Datang di <span style="color: var(--primary-color);">Restoranku</span>
                </h2>
                <p class="leading-relaxed mx-auto px-lg-4" style="font-size: 1.1rem; line-height: 1.8; color: #6c757d !important;">
                    Kami menghadirkan perpaduan sempurna antara resep turun-temurun asli Indonesia dengan bahan-bahan organik segar pilihan dari petani lokal Bali. Setiap sajian diramu oleh chef berpengalaman demi memanjakan lidah Anda.
                </p>
            </div>
        </div>
    </div>

    <!-- 3. Features Section -->
    <div class="container py-4 mb-5">
        <div class="row g-4 text-center">
            <!-- Feature 1 -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-fire fa-2x" style="color: var(--primary-color); transition: all 0.3s ease;"></i>
                    </div>
                    <h3 class="feature-title">Fresh & Panas</h3>
                    <p class="feature-desc">Semua hidangan baru dimasak setelah dipesan untuk menjamin kematangan, cita rasa prima, dan higienis maksimal.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-seedling fa-2x" style="color: var(--primary-color); transition: all 0.3s ease;"></i>
                    </div>
                    <h3 class="feature-title">Bumbu Alami</h3>
                    <p class="feature-desc">Bebas penguat rasa buatan (MSG). Kami hanya menggunakan rempah-rempah murni Nusantara untuk kelezatan alami yang sehat.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-star fa-2x" style="color: var(--primary-color); transition: all 0.3s ease;"></i>
                    </div>
                    <h3 class="feature-title">Layanan Istimewa</h3>
                    <p class="feature-desc">Pelayanan ramah berstandar tinggi yang memastikan kebahagiaan Anda dari suapan pertama hingga selesai makan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Chef's Recommendation (Menu Andalan Kami) -->
    <div class="container py-5" style="border-top: 1px solid rgba(0,0,0,0.05);">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="text-uppercase fw-bold" style="color: var(--primary-color); font-size: 0.85rem; letter-spacing: 2px;">Rekomendasi Chef</span>
                <h2 class="fw-bold m-0" style="color: var(--dark-color); font-size: 2.2rem; margin-top: 5px !important;">Menu Andalan Kami</h2>
            </div>
            <a href="{{ route('menu') }}" class="fw-bold text-decoration-none" style="color: var(--primary-color); font-size: 1rem; transition: color 0.2s;">
                Lihat Semua Menu <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @php
                $ratings = [
                    'Nasi Goreng Kampung' => '4.8',
                    'Sate Ayam Madura' => '4.9',
                    'Rendang Daging Sapi' => '4.95'
                ];
                $times = [
                    'Nasi Goreng Kampung' => '15 Menit',
                    'Sate Ayam Madura' => '20 Menit',
                    'Rendang Daging Sapi' => '25 Menit'
                ];
            @endphp

            @foreach ($featuredItems as $item)
                @php
                    $itemRating = $ratings[$item->name] ?? '4.8';
                    $itemTime = $times[$item->name] ?? '20 Menit';
                    
                    $imageSrc = $item->img;
                    if (!\Illuminate\Support\Str::startsWith($imageSrc, ['http://', 'https://'])) {
                        $imageSrc = asset('img_item_upload/' . $imageSrc);
                    }
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-img-wrapper">
                            <span class="menu-badge">SPESIAL</span>
                            <img src="{{ $imageSrc }}" class="menu-img" alt="{{ $item->name }}">
                        </div>
                        <div class="menu-body">
                            <div>
                                <div class="menu-meta d-flex justify-content-between">
                                    <span><i class="fas fa-star text-warning me-1"></i> {{ $itemRating }}</span>
                                    <span><i class="far fa-clock me-1"></i> {{ $itemTime }}</span>
                                </div>
                                <h3 class="menu-title">{{ $item->name }}</h3>
                                <p class="menu-desc">{{ $item->description }}</p>
                            </div>
                            <div class="menu-footer ">
                                <button onclick="addToCart({{ $item->id }})" class="btn btn-pesan-sm px-4 me-auto">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 5. Testimonials Section -->
    <div class="container py-5 my-5" style="border-top: 1px solid rgba(0,0,0,0.05);">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-bold" style="color: var(--primary-color); font-size: 0.85rem; letter-spacing: 2px;">Kata Mereka</span>
            <h2 class="fw-bold" style="color: var(--dark-color); font-size: 2.2rem; margin-top: 5px !important;">Apa Kata Pelanggan Setia Kami?</h2>
        </div>

        <div class="row g-4">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div>
                        <div class="stars-wrapper">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="quote-text">"Rendang Sapi di Restoranku benar-benar luar biasa! Dagingnya sangat lembut, bumbunya meresap sampai ke serat terdalam. Sangat mirip dengan masakan ibu saya."</p>
                    </div>
                    <div class="client-info">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop" class="client-avatar" alt="Budi Santoso">
                        <div>
                            <h4 class="client-name">Budi Santoso</h4>
                            <span class="client-status">Pecinta Kuliner Bali</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div>
                        <div class="stars-wrapper">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="quote-text">"Pemesanan online lewat situs ini mudah sekali! Es Kelapa Muda Jeruknya sangat menyegarkan di siang hari Bali yang panas. Kemasan pengirimannya juga rapi dan aman."</p>
                    </div>
                    <div class="client-info">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop" class="client-avatar" alt="Dewi Lestari">
                        <div>
                            <h4 class="client-name">Dewi Lestari</h4>
                            <span class="client-status">Blogger Makanan & Ibu Rumah Tangga</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div>
                        <div class="stars-wrapper">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="quote-text">"Setiap kali membawa wisatawan asing yang lapar ke Jimbaran, Restoranku selalu menjadi pilihan utama saya. Nasi Goreng Kampung dan Sate Ayam mereka selalu dipuji tamu-tamu saya."</p>
                    </div>
                    <div class="client-info">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" class="client-avatar" alt="Ketut Wijaya">
                        <div>
                            <h4 class="client-name">Ketut Wijaya</h4>
                            <span class="client-status">Pemandu Wisata Bandung</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notifications HTML wrapper -->
    <div class="toast-container-custom">
        <div id="cartToast" class="toast-custom">
            <div class="toast-icon">
                <i class="fas fa-check"></i>
            </div>
            <span id="toastMessage">Item berhasil ditambahkan ke keranjang!</span>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function showToast(message) {
            const toast = document.getElementById('cartToast');
            const toastMsg = document.getElementById('toastMessage');
            toastMsg.textContent = message;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        function addToCart(menuId) {
            fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: menuId }) 
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast(data.message);
                    
                    // Optional: If you have a cart count in the header bag icon, update it
                    // e.g. document.getElementById('cartCount').textContent = count;
                } else {
                    alert(data.message || 'Gagal menambahkan ke keranjang');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
@endsection
