@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Dashboard</h1>
      <p class="text-muted mb-0">Selamat datang di sistem informasi desa</p>
    </div>
    <div class="d-flex align-items-center" style="gap: 10px;">
      <span class="text-muted" style="font-size: 0.9rem;">
        <i class="fas fa-calendar-alt mr-2"></i>{{ date('d F Y') }}
      </span>
    </div>
  </div>

  <!-- Statistics Cards Row -->
  <div class="row mb-4">
    <!-- Card 1 - Total Penduduk -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 5px solid #4e73df;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Penduduk
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">1,234</div>
              <small class="text-success"><i class="fas fa-arrow-up"></i> 2.5% dari bulan lalu</small>
            </div>
            <div class="col-auto">
              <div class="rounded-circle d-flex align-items-center justify-content-center"
                style="width: 60px; height: 60px; background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <i class="fas fa-users fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 - Akun Aktif -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 5px solid #1cc88a;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Akun Aktif
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">856</div>
              <small class="text-muted"><i class="fas fa-check-circle"></i> Terverifikasi</small>
            </div>
            <div class="col-auto">
              <div class="rounded-circle d-flex align-items-center justify-content-center"
                style="width: 60px; height: 60px; background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);">
                <i class="fas fa-user-check fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 - Permintaan Akun -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 5px solid #f6c23e;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Permintaan Akun
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
              <small class="text-warning"><i class="fas fa-clock"></i> Menunggu persetujuan</small>
            </div>
            <div class="col-auto">
              <div class="rounded-circle d-flex align-items-center justify-content-center"
                style="width: 60px; height: 60px; background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%);">
                <i class="fas fa-user-clock fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4 - Aduan Warga -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 5px solid #e74a3b;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Aduan Warga
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
              <small class="text-info"><i class="fas fa-spinner"></i> 8 dalam proses</small>
            </div>
            <div class="col-auto">
              <div class="rounded-circle d-flex align-items-center justify-content-center"
                style="width: 60px; height: 60px; background: linear-gradient(135deg, #e74a3b 0%, #be2617 100%);">
                <i class="fas fa-bullhorn fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Grafik Penduduk -->
    <div class="col-xl-8 col-lg-7 mb-4">
      <div class="card shadow-sm" style="border-radius: 15px; border: none;">
        <div class="card-header bg-white py-3" style="border-radius: 15px 15px 0 0; border-bottom: 2px solid #f0f0f0;">
          <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-chart-line mr-2"></i>Statistik Penduduk
          </h6>
        </div>
        <div class="card-body">
          <div class="chart-area" style="position: relative; height: 320px;">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Aktivitas Terkini -->
    <div class="col-xl-4 col-lg-5 mb-4">
      <div class="card shadow-sm" style="border-radius: 15px; border: none;">
        <div class="card-header bg-white py-3" style="border-radius: 15px 15px 0 0; border-bottom: 2px solid #f0f0f0;">
          <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-history mr-2"></i>Aktivitas Terkini
          </h6>
        </div>
        <div class="card-body p-0">
          <div class="list-group list-group-flush">
            <div class="list-group-item border-0 px-4 py-3">
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mr-3"
                  style="width: 40px; height: 40px; min-width: 40px;">
                  <i class="fas fa-user-plus text-white"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="font-weight-600" style="font-size: 0.9rem;">Penduduk baru terdaftar</div>
                  <small class="text-muted">Ahmad Fauzi - 2 jam yang lalu</small>
                </div>
              </div>
            </div>
            <div class="list-group-item border-0 px-4 py-3" style="background-color: #f8f9fc;">
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-success d-flex align-items-center justify-content-center mr-3"
                  style="width: 40px; height: 40px; min-width: 40px;">
                  <i class="fas fa-check text-white"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="font-weight-600" style="font-size: 0.9rem;">Akun disetujui</div>
                  <small class="text-muted">Siti Nurhaliza - 3 jam yang lalu</small>
                </div>
              </div>
            </div>
            <div class="list-group-item border-0 px-4 py-3">
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center mr-3"
                  style="width: 40px; height: 40px; min-width: 40px;">
                  <i class="fas fa-bullhorn text-white"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="font-weight-600" style="font-size: 0.9rem;">Aduan baru masuk</div>
                  <small class="text-muted">Budi Santoso - 5 jam yang lalu</small>
                </div>
              </div>
            </div>
            <div class="list-group-item border-0 px-4 py-3" style="background-color: #f8f9fc;">
              <div class="d-flex align-items-center">
                <div class="rounded-circle bg-info d-flex align-items-center justify-content-center mr-3"
                  style="width: 40px; height: 40px; min-width: 40px;">
                  <i class="fas fa-edit text-white"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="font-weight-600" style="font-size: 0.9rem;">Data penduduk diperbarui</div>
                  <small class="text-muted">Rina Wati - 1 hari yang lalu</small>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-white text-center py-3"
            style="border-top: 2px solid #f0f0f0; border-radius: 0 0 15px 15px;">
            <a href="#" class="text-primary font-weight-600" style="font-size: 0.9rem; text-decoration: none;">
              Lihat Semua Aktivitas <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="row">
    <div class="col-12 mb-4">
      <div class="card shadow-sm" style="border-radius: 15px; border: none;">
        <div class="card-header bg-white py-3" style="border-radius: 15px 15px 0 0; border-bottom: 2px solid #f0f0f0;">
          <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-bolt mr-2"></i>Aksi Cepat
          </h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 col-sm-6 mb-3">
              <a href="/resident/create" class="btn btn-primary btn-block" style="border-radius: 10px; padding: 1rem;">
                <i class="fas fa-user-plus fa-2x mb-2"></i>
                <div class="font-weight-600">Tambah Penduduk</div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
              <a href="/account-request" class="btn btn-warning btn-block" style="border-radius: 10px; padding: 1rem;">
                <i class="fas fa-tasks fa-2x mb-2"></i>
                <div class="font-weight-600">Proses Permintaan</div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
              <a href="/complaint" class="btn btn-danger btn-block" style="border-radius: 10px; padding: 1rem;">
                <i class="fas fa-bullhorn fa-2x mb-2"></i>
                <div class="font-weight-600">Lihat Aduan</div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
              <a href="/resident" class="btn btn-info btn-block" style="border-radius: 10px; padding: 1rem;">
                <i class="fas fa-list fa-2x mb-2"></i>
                <div class="font-weight-600">Daftar Penduduk</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Card hover effects */
    .col-xl-3 .card {
      transition: all 0.3s ease;
    }

    .col-xl-3 .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    /* Icon circle pulse animation */
    .rounded-circle {
      transition: all 0.3s ease;
    }

    .card:hover .rounded-circle {
      transform: scale(1.1);
    }

    /* Quick action buttons */
    .btn-block {
      transition: all 0.3s ease;
    }

    .btn-block:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    /* Activity list hover */
    .list-group-item {
      transition: all 0.2s ease;
    }

    .list-group-item:hover {
      transform: translateX(5px);
    }

    /* Font weight utility */
    .font-weight-600 {
      font-weight: 600;
    }
  </style>

  <!-- Chart Script (example) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
  <script>
    // Example chart - ganti dengan data real dari controller
    const ctx = document.getElementById('myAreaChart');
    if (ctx) {
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
          datasets: [{
            label: 'Jumlah Penduduk',
            data: [1200, 1210, 1225, 1230, 1228, 1232, 1240, 1245, 1250, 1248, 1255, 1234],
            backgroundColor: 'rgba(78, 115, 223, 0.1)',
            borderColor: 'rgba(78, 115, 223, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true,
              position: 'top'
            }
          },
          scales: {
            y: {
              beginAtZero: false,
              min: 1150
            }
          }
        }
      });
    }
  </script>
@endsection
