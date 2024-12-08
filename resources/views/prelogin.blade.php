@extends('layouts.master')

@section('title', 'Pre Login Page')

@section('content')
<link href="{{ asset('css/prelogin.css') }}" rel="stylesheet">
     <div class="card p-4">
          <h2 class="text-center">Masuk ke Akun Anda</h2>
          <div class="d-flex justify-content-center btn">
               <button class="btn btn-primary" onclick="window.location.href=''">Masuk</button>
               <button class="btn btn-secondary" onclick="window.location.href=''">Daftar</button>
          </div>
     </div>
@endsection