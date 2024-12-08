@extends('layouts.master')

@section('title', 'Login Page')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="card p-4">
     <form action="">
          <h1>Login</h1>
          <div class="input-box">
               <input type="text" placeholder="Username" required>
               <i class='bx bxs-user'></i>
          </div>

          <div class="input-box">
               <input type="password" placeholder="Password" required>
               <i class='bx bxs-lock-alt'></i>
          </div>

          <div class="remember-forgot">
               <label><input type="checkbox"> Remember me</label>
               <a href="#">Forgot password?</a>
          </div>

          <button type="submit" class="btn">Login</button>

          <div class="register-link">
               <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
          </div>
    </form>
</div>
@endsection