@extends('template')

@section('content')
<link rel="stylesheet" href="{{ url('css/register.css') }}">
  

  <div class="container">
    <a href="{{ url('/') }}" class="back-arrow">&#8592; Kembali</a>
    <h2>Form Register</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <label for="name">Nama</label>
      <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
      @error('name')
        <div class="error">{{ $message }}</div>
      @enderror

      <label for="email">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required />
      @error('email')
        <div class="error">{{ $message }}</div>
      @enderror

      <label for="password">Password</label>
      <input id="password" type="password" name="password" required />
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror

      <label for="password_confirmation">Konfirmasi Password</label>
      <input id="password_confirmation" type="password" name="password_confirmation" required />

      <button type="submit">Daftar</button>
    </form>

    <p class="login-link">
      Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>
  </div>
@endsection
