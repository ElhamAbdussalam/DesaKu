@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Daftar Akun Penduduk</h1>
      <p class="text-muted mb-0">Kelola status akun penduduk desa</p>
    </div>
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
              <i class="fas fa-users mr-2"></i>Daftar Akun Terdaftar
            </h6>
            <span class="badge badge-primary badge-pill" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
              Total: {{ $users->total() }} akun
            </span>
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
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 150px; text-align: center;">
                    Status Akun</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 200px; text-align: center;">Aksi
                  </th>
                </tr>
              </thead>
              @if (count($users) < 1)
                <tbody>
                  <tr>
                    <td colspan="5" style="padding: 3rem; text-align: center; border: none;">
                      <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>
                      <p class="text-muted mb-0">Belum ada akun terdaftar</p>
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
                          <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mr-3"
                            style="width: 40px; height: 40px; font-weight: bold; color: white;">
                            {{ strtoupper(substr($item->name, 0, 1)) }}
                          </div>
                          <span class="font-weight-600">{{ $item->name }}</span>
                        </div>
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <i class="fas fa-envelope fa-sm text-muted mr-2"></i>{{ $item->email }}
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        @if ($item->status == 'approved')
                          <span class="badge badge-success"
                            style="padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem;">
                            <i class="fas fa-check-circle mr-1"></i>Aktif
                          </span>
                        @else
                          <span class="badge badge-danger"
                            style="padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem;">
                            <i class="fas fa-times-circle mr-1"></i>Tidak Aktif
                          </span>
                        @endif
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        @if ($item->status == 'approved')
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmationReject-{{ $item->id }}"
                            style="border-radius: 8px; padding: 0.5rem 1rem;">
                            <i class="fas fa-user-times mr-1"></i>Nonaktifkan
                          </button>
                        @else
                          <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#confirmationApprove-{{ $item->id }}"
                            style="border-radius: 8px; padding: 0.5rem 1rem;">
                            <i class="fas fa-user-check mr-1"></i>Aktifkan
                          </button>
                        @endif
                      </td>
                    </tr>
                    @include('pages.account-list.confirmation-approve')
                    @include('pages.account-list.confirmation-reject')
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
      background-color: #f8f9fc !important;
      transform: scale(1.002);
    }

    /* Avatar circle */
    .rounded-circle {
      font-size: 1.1rem;
    }

    /* Button hover effects */
    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
    }

    .btn-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    /* Badge styling */
    .badge {
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    .badge-success {
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    }

    .badge-danger {
      background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
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
  </style>
@endsection
