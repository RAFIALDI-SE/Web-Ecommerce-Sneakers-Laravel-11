<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .profile-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      padding: 2rem 2.5rem;

      max-width: 700px;
      width: 100%;
    }

    .username {
      font-size: 1.75rem;
      font-weight: 700;
      color: #2c3e50;
    }

    .info-label {
      font-weight: 600;
      color: #555;
    }

    .form-label {
      margin-top: 0.5rem;
      font-weight: 500;
    }


    .row .mb-3 {
        margin-bottom: 1rem !important;
    }


    .radio-group-wrapper {
      padding-top: 0.2rem;
    }
    .radio-group-wrapper label:not(.form-label) {
        margin-right: 15px;
        font-weight: 400;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      margin-top: 1.5rem;
      border-radius: 8px;
      padding: 0.6rem 1.2rem;
    }

    .btn-outline-primary {
      border-radius: 8px;
    }

    .profile-image {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #3498db;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="profile-card">
    <div class="text-center mb-4">
      @if($user->image)
        <img src="{{ asset('storage/' . $user->image) }}" alt="Foto Profil" class="profile-image">
      @else
        <img src="https://via.placeholder.com/120" alt="Foto Profil" class="profile-image">
      @endif
      <h2 class="username">Profil Pengguna</h2>
      <p class="text-muted">{{ $user->name }}</p>
    </div>

    <div class="mb-4">
      <p><span class="info-label">Nama Lengkap:</span> {{ $user->name }}</p>
      <p><span class="info-label">Alamat Email:</span> {{ $user->email }}</p>
      <p><span class="info-label">Role:</span> {{ $user->is_admin == 1 ? 'Admin' : 'Member' }}</p>
    </div>

    <form action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_telpon" class="form-label">No. Telepon</label>
                    <input type="text" name="no_telpon" id="no_telpon" value="{{ old('no_telpon', $user->no_telpon) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi Baru</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="radio-group-wrapper">
                        <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'checked' : '' }}>
                        <label for="laki">Laki-laki</label>

                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Foto Profil</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <small class="text-muted">Upload foto baru jika ingin mengganti.</small>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
      </form>

    <div class="text-center mt-4">
      <a href="{{ route('home') }}" class="btn btn-outline-primary">Kembali ke Beranda</a>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>