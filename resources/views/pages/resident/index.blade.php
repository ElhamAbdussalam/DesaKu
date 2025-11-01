@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Data Penduduk</h1>
      <p class="text-muted mb-0">Kelola data penduduk desa</p>
    </div>
    <a href="/resident/create" class="btn btn-primary shadow-sm" style="border-radius: 10px; padding: 0.6rem 1.5rem;">
      <i class="fas fa-plus fa-sm mr-2"></i>Tambah Data
    </a>
  </div>

  {{-- Table Card --}}
  <div class="row">
    <div class="col">
      <div class="card shadow-sm" style="border-radius: 15px; border: none;">
        <div class="card-header bg-white py-3" style="border-radius: 15px 15px 0 0; border-bottom: 2px solid #f0f0f0;">
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
              <i class="fas fa-table mr-2"></i>Daftar Penduduk
            </h6>
            <span class="badge badge-primary badge-pill" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
              Total: {{ $residents->total() }} orang
            </span>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
              <thead style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <tr>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">No</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">NIK</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Nama</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Jenis Kelamin</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Tempat, Tanggal Lahir</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Alamat</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Agama</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Status Perkawinan</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Pekerjaan</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Telepon</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600;">Status</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; text-align: center;">Aksi</th>
                </tr>
              </thead>
              @if (count($residents) < 1)
                <tbody>
                  <tr>
                    <td colspan="12" style="padding: 3rem; text-align: center; border: none;">
                      <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                      <p class="text-muted mb-0">Belum ada data penduduk</p>
                    </td>
                  </tr>
                </tbody>
              @else
                <tbody>
                  @foreach ($residents as $item)
                    <tr style="transition: all 0.2s ease;">
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $loop->iteration + $residents->firstItem() - 1 }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <span class="font-weight-bold">{{ $item->nik }}</span>
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $item->name }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        @if ($item->gender == 'Laki-laki')
                          <span class="badge badge-info">
                            <i class="fas fa-mars mr-1"></i>{{ $item->gender }}
                          </span>
                        @else
                          <span class="badge badge-pink" style="background-color: #e83e8c; color: white;">
                            <i class="fas fa-venus mr-1"></i>{{ $item->gender }}
                          </span>
                        @endif
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $item->birth_place }}, {{ $item->birth_date }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $item->address }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $item->religion }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $item->marital_status }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $item->occupation }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <i class="fas fa-phone fa-sm text-muted mr-1"></i>{{ $item->phone }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <span class="badge badge-success">{{ $item->status }}</span>
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        <div class="d-flex align-items-center justify-content-center" style="gap: 8px;">
                          <a href="/resident/{{ $item->id }}" class="btn btn-sm btn-warning"
                            style="border-radius: 8px; padding: 0.4rem 0.8rem;" title="Edit">
                            <i class="fas fa-edit"></i>
                          </a>
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmationDelete-{{ $item->id }}"
                            style="border-radius: 8px; padding: 0.4rem 0.8rem;" title="Hapus">
                            <i class="fas fa-trash"></i>
                          </button>
                          @if (!is_null($item->user_id))
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                              data-bs-target="#detailAccount-{{ $item->id }}"
                              style="border-radius: 8px; padding: 0.4rem 0.8rem;" title="Lihat Akun">
                              <i class="fas fa-user"></i>
                            </button>
                            @include('pages.resident.detail-account')
                          @endif
                        </div>
                      </td>
                    </tr>
                    @include('pages.resident.confirmation-delete')
                  @endforeach
                </tbody>
              @endif
            </table>
          </div>
        </div>
        @if ($residents->lastPage() > 1)
          <div class="card-footer bg-white py-3" style="border-top: 2px solid #f0f0f0; border-radius: 0 0 15px 15px;">
            {{ $residents->links('pagination::bootstrap-5') }}
          </div>
        @endif
      </div>
    </div>
  </div>

  <style>
    /* Hover effect untuk table rows */
    tbody tr:hover {
      background-color: #f8f9fc !important;
      transform: scale(1.005);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    /* Button hover effects */
    .btn-warning:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
    }

    .btn-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    .btn-info:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
    }

    /* Badge styling */
    .badge {
      padding: 0.4rem 0.8rem;
      border-radius: 8px;
      font-weight: 500;
    }

    /* Smooth transitions */
    .btn,
    tbody tr {
      transition: all 0.2s ease;
    }
  </style>
@endsection
