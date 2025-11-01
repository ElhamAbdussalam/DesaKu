@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Tambah Penduduk</h1>
      <p class="text-muted mb-0">Lengkapi formulir data penduduk baru</p>
    </div>
    <a href="/resident" class="btn btn-outline-secondary" style="border-radius: 10px;">
      <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
  </div>

  <div class="row">
    <div class="col-lg-10 mx-auto">
      <form action="/resident" method="POST">
        @csrf
        @method('POST')
        <div class="card shadow-sm" style="border-radius: 15px; border: none;">
          <div class="card-header bg-white py-3" style="border-radius: 15px 15px 0 0; border-bottom: 2px solid #f0f0f0;">
            <h6 class="m-0 font-weight-bold text-primary">
              <i class="fas fa-user-plus mr-2"></i>Informasi Penduduk
            </h6>
          </div>
          <div class="card-body p-4">
            <!-- Data Pribadi Section -->
            <div class="mb-4">
              <h6 class="text-primary font-weight-bold mb-3">
                <i class="fas fa-id-card mr-2"></i>Data Pribadi
              </h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="nik" class="font-weight-600">NIK <span class="text-danger">*</span></label>
                    <input type="number" inputmode="numeric" name="nik" id="nik"
                      class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                      placeholder="Masukkan NIK 16 digit" style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('nik')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="name" class="font-weight-600">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name"
                      class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                      placeholder="Masukkan nama lengkap" style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="gender" class="font-weight-600">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror"
                      style="border-radius: 10px; padding: 0.6rem 1rem;">
                      <option value="">Pilih jenis kelamin</option>
                      @foreach ([(object) ['label' => 'Laki-laki', 'value' => 'male'], (object) ['label' => 'Perempuan', 'value' => 'female']] as $item)
                        <option value="{{ $item->value }}" @selected(old('gender') == $item->value)>
                          {{ $item->label }}
                        </option>
                      @endforeach
                    </select>
                    @error('gender')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="birth_place" class="font-weight-600">Tempat Lahir <span
                        class="text-danger">*</span></label>
                    <input type="text" name="birth_place" id="birth_place"
                      class="form-control @error('birth_place') is-invalid @enderror" value="{{ old('birth_place') }}"
                      placeholder="Kota/Kabupaten" style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('birth_place')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="birth_date" class="font-weight-600">Tanggal Lahir <span
                        class="text-danger">*</span></label>
                    <input type="date" name="birth_date" id="birth_date"
                      class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}"
                      style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('birth_date')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="address" class="font-weight-600">Alamat Lengkap <span class="text-danger">*</span></label>
                <textarea name="address" id="address" rows="4" class="form-control @error('address') is-invalid @enderror"
                  placeholder="Masukkan alamat lengkap..." style="border-radius: 10px; padding: 0.8rem 1rem;">{{ old('address') }}</textarea>
                @error('address')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <hr style="border-top: 2px solid #f0f0f0;">

            <!-- Data Tambahan Section -->
            <div class="mb-4">
              <h6 class="text-primary font-weight-bold mb-3">
                <i class="fas fa-info-circle mr-2"></i>Informasi Tambahan
              </h6>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="religion" class="font-weight-600">Agama <span class="text-danger">*</span></label>
                    <input type="text" name="religion" id="religion"
                      class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion') }}"
                      placeholder="Masukkan agama" style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('religion')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="marital_status" class="font-weight-600">Status Perkawinan <span
                        class="text-danger">*</span></label>
                    <select name="marital_status" id="marital_status"
                      class="form-control @error('marital_status') is-invalid @enderror"
                      style="border-radius: 10px; padding: 0.6rem 1rem;">
                      <option value="">Pilih status</option>
                      @foreach ([(object) ['label' => 'Belum Menikah', 'value' => 'single'], (object) ['label' => 'Sudah Menikah', 'value' => 'married'], (object) ['label' => 'Cerai', 'value' => 'divorced'], (object) ['label' => 'Janda/Duda', 'value' => 'widowed']] as $item)
                        <option value="{{ $item->value }}" @selected(old('marital_status') == $item->value)>
                          {{ $item->label }}
                        </option>
                      @endforeach
                    </select>
                    @error('marital_status')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="occupation" class="font-weight-600">Pekerjaan <span
                        class="text-danger">*</span></label>
                    <input type="text" name="occupation" id="occupation"
                      class="form-control @error('occupation') is-invalid @enderror" value="{{ old('occupation') }}"
                      placeholder="Masukkan pekerjaan" style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('occupation')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="phone" class="font-weight-600">Nomor Telepon <span
                        class="text-danger">*</span></label>
                    <input type="text" name="phone" id="phone" inputmode="numeric"
                      class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                      placeholder="08xxxxxxxxxx" style="border-radius: 10px; padding: 0.6rem 1rem;">
                    @error('phone')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="status" class="font-weight-600">Status Penduduk <span
                    class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                  style="border-radius: 10px; padding: 0.6rem 1rem;">
                  <option value="">Pilih status</option>
                  @foreach ([(object) ['label' => 'Aktif', 'value' => 'active'], (object) ['label' => 'Pindah', 'value' => 'moved'], (object) ['label' => 'Almarhum', 'value' => 'deceased']] as $item)
                    <option value="{{ $item->value }}" @selected(old('status') == $item->value)>
                      {{ $item->label }}
                    </option>
                  @endforeach
                </select>
                @error('status')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          <div class="card-footer bg-white py-3" style="border-top: 2px solid #f0f0f0; border-radius: 0 0 15px 15px;">
            <div class="d-flex justify-content-end" style="gap: 10px;">
              <a href="/resident" class="btn btn-outline-secondary"
                style="border-radius: 10px; padding: 0.6rem 1.5rem;">
                <i class="fas fa-times mr-2"></i>Batal
              </a>
              <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 0.6rem 1.5rem;">
                <i class="fas fa-save mr-2"></i>Simpan Data
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <style>
    /* Form styling */
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .form-control {
      transition: all 0.2s ease;
    }

    .form-control:hover {
      border-color: #a8b3f7;
    }

    /* Label styling */
    label.font-weight-600 {
      font-weight: 600;
      color: #4a5568;
      font-size: 0.9rem;
      margin-bottom: 0.5rem;
    }

    /* Button hover effects */
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .btn-outline-secondary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
    }

    .btn {
      transition: all 0.2s ease;
    }

    /* Section headers */
    h6.text-primary {
      color: #667eea !important;
    }

    /* Required asterisk */
    .text-danger {
      font-weight: bold;
    }
  </style>
@endsection
