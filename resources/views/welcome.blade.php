@extends('layouts.app', ['title' => 'Beranda'])

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Selamat Datang</h1>

        <div class="row justify-content-end mb-4">
            <div class="col-4">
                <form action="{{ route('campaign.search') }}" method="GET" class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Cari campaign atau donasi..."
                        value="{{ request('q') }}">
                    <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($campaigns->take(3) as $key => $campaign)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $campaign->carousel) }}" class="d-block w-100 img-fluid" alt="{{ $campaign->name }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $campaign->name }}</h5>
                            <p>{{ Str::limit($campaign->description, 250) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/1200x400" class="d-block w-100 img-fluid"
                            alt="Belum ada campaign">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Belum ada campaign</h5>
                            <p>Tunggu Informasi Selanjutnya!</p>
                        </div>
                    </div>
                @endforelse

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

        <h2 class="text-center mb-4">Sedikit Untukmu Banyak Untuk Mereka</h2>


        <div class="row d-flex justify-content-between align-items-center mb-4">
            <div class="col-auto">
                <h2 class="mr-2">Donasi Terkini</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('all-campaign') }}" class="btn btn-sm btn-outline-primary" style="font-size: 14px">Lihat
                    lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>


        <div class="row">
            @forelse ($campaigns->take(3) as $campaign)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top" alt="{{ $campaign->name }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ Str::limit($campaign->name, 20) }}</h3>
                            <p class="card-text">{{ Str::limit($campaign->description, 100) }}</p>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <h4><strong>Rp.{{ $campaign->getTotalDonation() }}</strong></h4>
                                <p><i class="fa fa-users"></i> {{ $campaign->countTotalDonatur() }}</p>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ $campaign->donation_percentage }}%;"
                                    aria-valuenow="{{ $campaign->donation_percentage }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <h6><strong>{{ $campaign->donation_percentage }}%</strong> dari Target
                                    Rp.{{ $campaign->formatted_goal }}</h6>
                                <small class="text-muted"><i class="fa fa-clock"></i> {{ $campaign->remaining_days }} Hari
                                    Lagi</small>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('campaign.show', $campaign) }}"
                                        class="btn btn-sm btn-outline-primary" style="font-size: 14px">Lihat
                                        Detail</a>
                                    <a href="{{ route('campaign.form', $campaign) }}"
                                        class="btn btn-sm btn-outline-success" style="font-size: 14px">Donasi</a>
                                </div>
                                <small class="text-muted">{{ $campaign->diffCreatedAtForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <hr>
                <div class="col-md-12">
                    <h3 class="text-center">Belum ada campaign yang tersedia</h3>
                </div>
            @endforelse
        </div>
    </div>
@endsection
