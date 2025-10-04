@extends('layouts.clientlayout')
@section('content')
<div class="container">
    <h3>Dashboard Client (Dapur)</h3>
    <p>Selamat datang, {{ Auth::user()->name }}</p>
</div>
@endsection
