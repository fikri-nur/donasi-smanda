@extends('layouts.app', ['title' => 'Donasi'])

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Bantu Siapa Hari Ini?</h1>

        <div class="row justify-content-end mb-4">
            <div class="col-4">
                <form action="{{ route('campaign.search') }}" method="GET" class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Cari campaign atau donasi..."
                        value="{{ request('q') }}">
                    <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>


        <div class="row">
            @forelse ($campaigns as $campaign)
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
                                    <a href="{{ route('campaign.form', $campaign) }}" class="btn btn-sm btn-outline-success"
                                        style="font-size: 14px">Donasi</a>
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

        <div class="row justify-content-center">
            <div class="d-flex justify-content-end">
                {{ $campaigns->links() }}
            </div>
        </div>

    </div>
@endsection
