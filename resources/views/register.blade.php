@extends('layouts.master')

@section('title', 'Register Page')

@section('content')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
<div class="card p-4">
    <h2 class="text-center">Let's start with your name & email</h2>
    <p class="text-center">Silakan masukkan email atau username dan kata sandi Anda untuk mengakses sistem.</p>
    <form>
          <div class="mb-3">
              <label for="name" class="form-label">Enter your name</label>
              <input type="text" class="form-control" id="name" placeholder="Nama Anda">
          </div>
          <div class="mb-3">
              <label for="email" class="form-label">Enter your email *</label>
              <input type="email" class="form-control" id="email" placeholder="Email Anda">
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Kata Sandi">
          </div>
          <div class="d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" onclick="window.location.href=''">Cancel</button>
              <button type="submit" class="btn btn-primary">Next</button>
          </div>
    </form>
    <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Log In</a></p>
</div>
@endsection