@extends('layouts.app', ['title' => 'Beranda'])

@push('css')
    
@endpush

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Selamat Datang</h1>

        <div class="row justify-content-end mb-4">
            <div class="col-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari campaign atau donasi...">
                    <button class="btn btn-sm btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>

        <div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($campaigns->take(3) as $key => $campaign)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ $campaign->carousel }}" class="d-block w-100 img-fluid" alt="{{ $campaign->name }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $campaign->name }}</h5>
                            <p>{{ $campaign->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h2 class="text-center mb-4">Donasi Terkini</h2>

        <div class="row justify-content-end mt-1 mb-4">
            <div class="col-auto">
                <a href="{{ route('all-campaign') }}" class="btn btn-sm btn-outline-primary" style="font-size: 14px">Lihat lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="row">
            @foreach ($campaigns->take(3) as $campaign)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $campaign->image }}" class="card-img-top" alt="{{ $campaign->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $campaign->name }}</h5>
                            <p class="card-text">{{ $campaign->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="" class="btn btn-sm btn-outline-primary" style="font-size: 14px">Lihat Detail</a>
                                    <a href="" class="btn btn-sm btn-outline-success" style="font-size: 14px">Donasi</a>
                                </div>
                                <small class="text-muted">{{ $campaign->diffCreatedAtForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
