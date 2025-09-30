@extends('template')

@section('content')
<link rel="stylesheet" href="{{ url('css/register.css') }}">

<div class="container">
    <a href="{{ url('/') }}" class="back-arrow">&#8592; Kembali</a>
    <h2>Form Register</h2>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-50">
                <label for="name">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-50">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required />
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-50">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-50">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>
        </div>

        <div class="form-row">
            <div class="col-50">
                <label for="no_telpon">No. Telepon</label>
                <input id="no_telpon" type="text" name="no_telpon" value="{{ old('no_telpon') }}" required />
                @error('no_telpon')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-50">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                    <label for="laki">Laki-laki</label>

                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                    <label for="perempuan">Perempuan</label>
                </div>
                @error('jenis_kelamin')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <button type="submit">Daftar</button>
    </form>

    <p class="login-link">
        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>
</div>
@endsection