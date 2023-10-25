@extends('dashboard.layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard Admin</div>

                    <div class="card-body">
                        <p>Ini adalah halaman dashboard.
                            Kelola data website dengan memilih menu yang ada di atas.</p>
                        <p>Selamat datang, {{ Auth::user()->name }}!.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
