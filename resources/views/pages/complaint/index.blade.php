@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Aduan Warga</h1>
      <p class="text-muted mb-0">Kelola laporan dan aduan dari warga desa</p>
    </div>
    @if (isset(auth()->user()->resident))
      <a href="/complaint/create" class="btn btn-primary shadow-sm" style="border-radius: 10px; padding: 0.6rem 1.5rem;">
        <i class="fas fa-plus fa-sm mr-2"></i>Buat Aduan Baru
      </a>
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

  @if (session('error'))
    <script>
      Swal.fire({
        title: "Terjadi Kesalahan!",
        text: "{{ session()->get('error') }}",
        icon: "error"
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
              <i class="fas fa-bullhorn mr-2"></i>Daftar Aduan
            </h6>
            <span class="badge badge-primary badge-pill" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
              Total: {{ $complaints->total() }} aduan
            </span>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
              <thead style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <tr>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 60px;">No</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; min-width: 200px;">Judul Aduan</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; min-width: 300px;">Isi Aduan</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 150px; text-align: center;">
                    Status</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 150px; text-align: center;">Foto
                    Bukti</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 180px;">Tanggal Laporan</th>
                  <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; width: 150px; text-align: center;">Aksi
                  </th>
                </tr>
              </thead>
              @if (count($complaints) < 1)
                <tbody>
                  <tr>
                    <td colspan="7" style="padding: 3rem; text-align: center; border: none;">
                      <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                      <p class="text-muted mb-0 font-weight-600">Belum ada aduan</p>
                      <small class="text-muted">Tidak ada laporan aduan saat ini</small>
                    </td>
                  </tr>
                </tbody>
              @else
                <tbody>
                  @foreach ($complaints as $item)
                    <tr style="transition: all 0.2s ease;">
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        {{ $loop->iteration + $complaints->firstItem() - 1 }}
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <span class="font-weight-600">{{ $item->title }}</span>
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <div style="max-height: 100px; overflow-y: auto; line-height: 1.5;">
                          {!! nl2br(e($item->content)) !!}
                        </div>
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        @php
                          $statusClass = match ($item->status ?? 'pending') {
                              'resolved' => 'success',
                              'in_progress' => 'info',
                              'rejected' => 'danger',
                              default => 'warning',
                          };
                          $statusIcon = match ($item->status ?? 'pending') {
                              'resolved' => 'check-circle',
                              'in_progress' => 'spinner',
                              'rejected' => 'times-circle',
                              default => 'clock',
                          };
                        @endphp
                        <span class="badge badge-{{ $statusClass }}"
                          style="padding: 0.5rem 0.9rem; border-radius: 20px; font-size: 0.8rem;">
                          <i class="fas fa-{{ $statusIcon }} mr-1"></i>{{ $item->status_label }}
                        </span>
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        @if (isset($item->photo_proof))
                          @php
                            $filePath = asset('storage/' . $item->photo_proof);
                          @endphp
                          <a href="{{ $filePath }}" target="_blank" rel="noopener noreferrer"
                            class="photo-preview-link">
                            <img src="{{ $filePath }}" alt="Foto Bukti"
                              style="max-width: 80px; max-height: 80px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer; transition: transform 0.2s; object-fit: cover;"
                              onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"
                              onerror="this.parentElement.innerHTML='<span class=\'text-danger\'><i class=\'fas fa-exclamation-triangle\'></i><br>Gagal memuat</span>'">
                          </a>
                        @else
                          <span class="text-muted" style="font-size: 0.85rem;">
                            <i class="fas fa-image-slash"></i><br>Tidak ada
                          </span>
                        @endif
                      </td>
                      <td style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0;">
                        <i class="fas fa-calendar-alt fa-sm text-muted mr-2"></i>
                        <span style="font-size: 0.9rem;">{{ $item->report_date_label }}</span>
                      </td>
                      <td
                        style="padding: 1rem 1.5rem; vertical-align: middle; border-bottom: 1px solid #f0f0f0; text-align: center;">
                        <div class="d-flex justify-content-center" style="gap: 8px;">
                          <a href="/complaint/{{ $item->id }}" class="btn btn-sm btn-warning"
                            style="border-radius: 8px; padding: 0.4rem 0.8rem;" title="Edit">
                            <i class="fas fa-edit"></i>
                          </a>
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmationDelete-{{ $item->id }}"
                            style="border-radius: 8px; padding: 0.4rem 0.8rem;" title="Hapus">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    @include('pages.complaint.confirmation-delete')
                  @endforeach
                </tbody>
              @endif
            </table>
          </div>
        </div>
        @if ($complaints->lastPage() > 1)
          <div class="card-footer bg-white py-3" style="border-top: 2px solid #f0f0f0; border-radius: 0 0 15px 15px;">
            {{ $complaints->links('pagination::bootstrap-5') }}
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

    /* Content scrollable area */
    td>div {
      scrollbar-width: thin;
      scrollbar-color: #cbd5e0 #f7fafc;
    }

    td>div::-webkit-scrollbar {
      width: 6px;
    }

    td>div::-webkit-scrollbar-track {
      background: #f7fafc;
      border-radius: 10px;
    }

    td>div::-webkit-scrollbar-thumb {
      background: #cbd5e0;
      border-radius: 10px;
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

    /* Badge styling with gradients */
    .badge {
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    .badge-success {
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    }

    .badge-warning {
      background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
      color: white;
    }

    .badge-info {
      background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    }

    .badge-danger {
      background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    }

    /* Smooth transitions */
    .btn,
    tbody tr,
    img {
      transition: all 0.2s ease;
    }

    /* Font weight */
    .font-weight-600 {
      font-weight: 600;
    }

    /* Photo link styling */
    .photo-preview-link {
      display: inline-block;
    }
  </style>
@endsection
