<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Purepay - Dompet Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", sans-serif;
    }

    /* Navbar */
    .bg-custom-blue {
      background-color: #1c4df3;
    }

    .navbar .nav-link {
      color: #ffffff !important;
      margin-right: 1rem;
      font-weight: 500;
    }

    .navbar .nav-link:hover {
      text-decoration: underline;
    }

    /* Hero Section */
    .hero-section {
      background: linear-gradient(90deg, #1c4df3 0%, #5b69f1 100%);
      color: white;
      padding: 6rem 0;
      position: relative;
      overflow: hidden;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.1rem;
      line-height: 1.8;
    }

    .btn-download {
      background-color: white;
      color: #1c4df3;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 12px;
      font-size: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .btn-download:hover {
      background-color: #e2e2e2;
      color: #1c4df3;
    }

    /* Phone Mockup */
    .phone-wrapper {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .phone-background {
      width: 220px;
      height: 400px;
      background: linear-gradient(180deg, #8265f1, #6a4de0);
      border-radius: 2rem;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
    }

    .phone-icon {
      position: absolute;
      color: white;
      font-size: 2.5rem;
    }

  .hover-shadow {
  transition: box-shadow 0.3s ease;
}

.hover-shadow:hover {
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.transition {
  transition: all 0.3s ease-in-out;
}

.icon-wrapper {
  width: 60px;
  height: 60px;
  background-color: #2563eb;
  border-radius: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto 1rem auto;
}

.category-card {
  transition: all 0.3s ease;
}

 .category-card:hover {
    border: 2px solid #2563eb;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  }

 .modal-content {
    overflow: hidden;
  }

  .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
  }

  .card-footer {
    text-align: center;
  }

  .modal-header {
    background: linear-gradient(to right, #2563eb, #3b82f6);
  }

  .btn-outline-primary {
    border-color: #2563eb;
    color: #2563eb;
  }

  .btn-outline-primary:hover {
    background-color: #2563eb;
    color: white;
  }

  .hide-scrollbar {
    scrollbar-width: none; /* Firefox */
  }

  .hide-scrollbar::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Edge */
  }

  #testimoniContainer > div:hover {
    transform: translateY(-5px);
  }



    /* Responsive */
    @media (max-width: 768px) {
      .hero-section h1 {
        font-size: 2.2rem;
      }

      .phone-background {
        width: 160px;
        height: 300px;
      }

      .phone-icon {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-custom-blue navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Purepay</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#Produk">Produk</a></li>
          <li class="nav-item"><a class="nav-link" href="#Testimoni">Testimoni</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="hero" class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Text -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="mb-3">Dompet Digital Modern<br>untuk Semua</h1>
          <p class="mb-4">
            Kelola keuangan digital Anda dengan mudah, aman, dan terpercaya. Nikmati berbagai fitur canggih dalam satu aplikasi yang user-friendly.
          </p>
            <a href="https://play.google.com/store" target="_blank" class="btn btn-download">
            <i class="bi bi-download me-2"></i>Download Sekarang
            </a>
        </div>

        <!-- Phone Mockup -->
        <div class="col-lg-6 text-center">
          <div class="phone-wrapper">
          <div class="phone-mockup">
        <img src="images/Tampilan.png" alt="Tampilan Aplikasi" class="screenshot-inside" />
    </div>
  </div>
</div>
    </div>
  </section>

<!-- Fitur Unggulan -->
<section id="fitur" style="background-color: #f8fbff; padding: 5rem 0;">
  <div class="container text-center">
    <h2 class="fw-bold mb-2" style="color: #0f172a;">Fitur Unggulan Kami</h2>
    <p class="mb-5 text-muted">Nikmati kemudahan dan keamanan dalam setiap transaksi</p>

    <div class="row g-4">
      @php
        $fitur = [
          ['icon' => 'shield-lock', 'title' => 'Keamanan Terjamin', 'desc' => 'Data dan transaksi Anda dilindungi dengan teknologi enkripsi tingkat bank yang paling canggih.'],
          ['icon' => 'arrow-left-right', 'title' => 'Transfer Instan', 'desc' => 'Kirim dan terima uang dalam hitungan detik ke sesama pengguna tanpa biaya tambahan.'],
          ['icon' => 'wallet2', 'title' => 'Top Up Mudah', 'desc' => 'Isi saldo dengan berbagai metode pembayaran dari bank, minimarket, hingga e-wallet.'],
          ['icon' => 'clock-history', 'title' => 'Riwayat Lengkap', 'desc' => 'Pantau semua aktivitas transaksi dengan detail lengkap dan laporan yang transparan.'],
          ['icon' => 'credit-card-2-front', 'title' => 'Pembayaran Praktis', 'desc' => 'Bayar tagihan, belanja online, dan berbagai layanan lainnya dalam satu aplikasi.'],
          ['icon' => 'stars', 'title' => 'Layanan Premium', 'desc' => 'Akses berbagai produk digital dan layanan eksklusif untuk member premium.'],
        ];
      @endphp

      @foreach ($fitur as $item)
  <div class="col-md-6 col-lg-4">
  <div class="p-4 rounded-4 shadow-sm h-100 bg-white border hover-shadow transition">
    <!-- Gunakan class .icon-wrapper -->
    <div class="icon-wrapper">
      <i class="bi bi-{{ $item['icon'] }} text-white fs-4"></i>
    </div>
    <h5 class="fw-semibold text-dark">{{ $item['title'] }}</h5>
    <p class="text-muted small">{{ $item['desc'] }}</p>
  </div>
</div>
      @endforeach
    </div>
  </div>
</section>


<!-- Produk Section -->
<section id="Produk" style="background-color: #ffffff;" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="font-size: 2.5rem;">
        Produk <span class="text-primary">Unggulan</span>
      </h2>
      <p class="text-muted fs-5">Berbagai pilihan produk digital terbaik untuk kebutuhan Anda</p>
    </div>

    <div class="row align-items-center mb-5">
      <div class="col-md-6 mb-3 mb-md-0">
        <div class="bg-light rounded-4 d-flex justify-content-center align-items-center" style="height: 250px;">
          <img src="images/images1.png" alt="Ilustrasi HP" class="img-fluid" style="max-height: 230px;">
        </div>
      </div>
      <div class="col-md-6">
        <h4 class="fw-bold mb-3">Belanja Digital Tanpa Batas</h4>
        <p class="text-muted">
          Dapatkan akses ke ribuan produk digital mulai dari token listrik, pulsa, paket data, hingga voucher game favorit.
          Semua tersedia dalam satu platform dengan proses yang cepat, mudah, dan terpercaya.
        </p>
      </div>
    </div>

    <!-- Kategori Produk -->
    <div class="row g-4">
      @foreach($categories as $cat)
      @php
        $icons = [
          'token' => 'bi-lightning-charge-fill',
          'pulsa' => 'bi-phone-fill',
          'data' => 'bi-wifi',
          'game' => 'bi-controller'
        ];
        $iconClass = $icons[strtolower($cat['name'])] ?? 'bi-box'; // default icon
      @endphp
      <div class="col-6 col-sm-4 col-md-3">
        <button type="button"
          class="category-card bg-white border rounded-4 shadow-sm text-center py-4 px-2 w-100 h-100"
          data-bs-toggle="modal" data-bs-target="#categoryModal{{ $cat['id'] }}">
          <div class="icon-wrapper mx-auto mb-3">
            <i class="bi {{ $iconClass }} fs-2 text-white"></i>
          </div>
          <h6 class="fw-semibold text-dark mb-0">{{ $cat['name'] }}</h6>
        </button>
      </div>
      @endforeach
    </div>
  </div>
</section>



<!-- Modal Produk per Kategori -->
@foreach($categories as $cat)
<div class="modal fade" id="categoryModal{{ $cat['id'] }}" tabindex="-1"
  aria-labelledby="categoryLabel{{ $cat['id'] }}" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow-lg">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title fw-semibold" id="categoryLabel{{ $cat['id'] }}">
          Produk {{ $cat['name'] }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body px-4 py-3">
        <div class="row">
          @forelse($categoryProducts[$cat['id']] as $product)
          <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm rounded-4">
              <div class="card-body">
                <h5 class="fw-semibold text-dark mb-2">{{ $product->name }}</h5>
                <p class="text-muted small text-truncate mb-2">{{ $product->description }}</p>
                <p class="fw-bold text-primary mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <div class="alert alert-warning rounded-3">
              <i class="bi bi-info-circle me-2"></i> Tidak ada produk dalam kategori ini.
            </div>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach



<!-- Section: Testimoni -->
<section id="Testimoni" class="py-5" style="background-color: #f9fbfc;">
  <div class="container text-center">
    <h2 class="fw-bold mb-2" style="color: #1f2937;">Apa Kata Pengguna</h2>
    <p class="mb-5 text-muted">Ribuan pengguna telah merasakan kemudahan Purepay</p>

    @if ($testimonials->count())
      <div class="d-flex justify-content-end mb-4 gap-2">
        <button id="scrollLeft" class="btn btn-outline-dark rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
          <i class="bi bi-arrow-left"></i>
        </button>
        <button id="scrollRight" class="btn btn-outline-dark rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
          <i class="bi bi-arrow-right"></i>
        </button>
      </div>

      <div id="testimoniContainer" class="d-flex overflow-auto gap-4 px-2 pb-3 hide-scrollbar" style="scroll-behavior: smooth; scroll-snap-type: x mandatory;">
        @foreach ($testimonials as $item)
          <div class="flex-shrink-0" style="min-width: 280px; max-width: 320px; scroll-snap-align: start;">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 text-start border border-light-subtle position-relative" style="transition: transform 0.3s ease; background-image: linear-gradient(to bottom right, #ffffff, #f0f4f8);">
              <p class="fst-italic text-secondary mb-4">"{{ $item->message }}"</p>
              <div>
                <strong class="text-dark d-block">{{ $item->name }}</strong>
                <small class="text-muted">{{ $item->role }}</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-muted text-center">Belum ada testimoni.</p>
    @endif
  </div>
</section>

<!-- Scroll JS -->
<script>
  const container = document.getElementById('testimoniContainer');
  const scrollLeft = document.getElementById('scrollLeft');
  const scrollRight = document.getElementById('scrollRight');

  if (container && scrollLeft && scrollRight) {
    scrollLeft.addEventListener('click', () => {
      container.scrollBy({ left: -320, behavior: 'smooth' });
    });

    scrollRight.addEventListener('click', () => {
      container.scrollBy({ left: 320, behavior: 'smooth' });
    });
  }
</script>


<!-- Section: Form Testimoni -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-4">
      <h3 class="fw-bold">Bagikan Pengalaman Anda</h3>
    </div>

    @if (session('success'))
      <div class="alert alert-success text-center">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('testimoni.submit') }}">
      @csrf
      <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
      </div>
      <div class="mb-3">
        <input type="text" name="role" class="form-control" placeholder="Pekerjaan" required>
      </div>
      <div class="mb-3">
        <textarea name="message" rows="3" class="form-control" placeholder="Tulis Pengalaman anda menggunakan Purepay" required></textarea>
      </div>
      <div class="text-end">
        <button type="submit" name="submit_testimoni" class="btn btn-primary px-4">Kirim Testimoni</button>
      </div>
    </form>
  </div>
</section>

<footer style="background-color: #1f1f1f; color: #fff; text-align: center; padding: 15px 0;">
  <small>© 2025 Purepay. Dompet Digital Pilihan.</small>
</footer>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
