@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Datang di SMANDA Beramal</div>

                <div class="card-body">
                    <p>Website ini adalah platform untuk mendukung kegiatan donasi di SMANDA. Anda dapat berdonasi untuk mendukung berbagai proyek sekolah dan kegiatan siswa.</p>

                    @guest
                    <p>Silakan <a href="{{ route('login') }}">masuk</a> atau <a href="{{ route('register') }}">daftar</a> untuk mulai berdonasi.</p>
                    @else
                    <p>Selamat datang, {{ Auth::user()->name }}! Anda dapat mulai berdonasi untuk mendukung proyek-proyek sekolah kami.</p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
