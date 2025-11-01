@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Permintaan Akun</h1>
      <p class="text-muted mb-0">Kelola permintaan pendaftaran akun penduduk</p>
    </div>
    @if (count($users) > 0)
      <span class="badge badge-warning badge-pill" style="font-size: 0.95rem; padding: 0.6rem 1.2rem;">
        <i class="fas fa-clock mr-2"></i>{{ count($users) }} permintaan menunggu
      </span>
    @endif
  </div>

  @if (session('success'))
    <script>
      Swal.fire({
        title: "Berhasil!",
        text: "{{ session()->get('success') }}",
        icon: "success"
      });
    </script>
  @endif

  {{-- Table Card --}}
  <div class="row">
    <div class="col">
      <div class="card shadow-sm" style="border-radius: 15px; border: none;">
        <div class="card-header bg-white py-3" style="border-radius: 15px 15px 0 0; border-bottom: 2px solid #f0f0f0;">
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
              <i class="fas fa-user-clock mr-2"></i>Daftar Permintaan Akun
            </h6>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
              <thead style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <tr>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 80px;">No</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Nama Lengkap</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Email</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 250px; text-align: center;">Aksi
                  </th>
                </tr>
              </thead>
              @if (count($users) < 1)
                <tbody>
                  <tr>
                    <td colspan="4" style="padding: 3rem; text-align: center; border: none;">
                      <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                      <p class="text-muted mb-0 font-weight-600">Semua permintaan sudah diproses</p>
                      <small class="text-muted">Tidak ada permintaan akun baru saat ini</small>
                    </td>
                  </tr>
                </tbody>
              @else
                <tbody>
                  @foreach ($users as $item)
                    <tr style="transition: all 0.2s ease;">
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $loop->iteration + $users->firstItem() - 1 }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center mr-3"
                            style="width: 40px; height: 40px; font-weight: bold; color: white;">
                            {{ strtoupper(substr($item->name, 0, 1)) }}
                          </div>
                          <div>
                            <span class="font-weight-600 d-block">{{ $item->name }}</span>
                            <span class="badge badge-warning" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">
                              <i class="fas fa-hourglass-half mr-1"></i>Menunggu Persetujuan
                            </span>
                          </div>
                        </div>
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <i class="fas fa-envelope fa-sm text-muted mr-2"></i>{{ $item->email }}
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        <div class="d-flex justify-content-center" style="gap: 10px;">
                          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmationReject-{{ $item->id }}"
                            style="border-radius: 8px; padding: 0.5rem 1rem; border-width: 2px;">
                            <i class="fas fa-times-circle mr-1"></i>Tolak
                          </button>
                          <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#confirmationApprove-{{ $item->id }}"
                            style="border-radius: 8px; padding: 0.5rem 1rem;">
                            <i class="fas fa-check-circle mr-1"></i>Setujui
                          </button>
                        </div>
                      </td>
                    </tr>
                    @include('pages.account-request.confirmation-approve')
                    @include('pages.account-request.confirmation-reject')
                  @endforeach
                </tbody>
              @endif
            </table>
          </div>
        </div>
        @if ($users->lastPage() > 1)
          <div class="card-footer bg-white py-3" style="border-top: 2px solid #f0f0f0; border-radius: 0 0 15px 15px;">
            {{ $users->links('pagination::bootstrap-5') }}
          </div>
        @endif
      </div>
    </div>
  </div>

  <style>
    /* Hover effect untuk table rows */
    tbody tr:hover {
      background-color: #fffbf0 !important;
      transform: scale(1.002);
    }

    /* Avatar circle dengan warning color */
    .rounded-circle.bg-warning {
      background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%) !important;
      font-size: 1.1rem;
      box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
    }

    /* Button hover effects */
    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
    }

    .btn-outline-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
      background-color: #dc3545;
      color: white;
    }

    /* Badge styling */
    .badge {
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    .badge-warning {
      background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
      color: white;
    }

    .badge-pill {
      box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
    }

    /* Smooth transitions */
    .btn,
    tbody tr {
      transition: all 0.2s ease;
    }

    /* Font weight */
    .font-weight-600 {
      font-weight: 600;
    }

    /* Success state icon animation */
    .fa-check-circle {
      animation: pulse 2s infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0.6;
      }
    }
  </style>
@endsection
