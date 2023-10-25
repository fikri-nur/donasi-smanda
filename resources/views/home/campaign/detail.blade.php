@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('all-campaign') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top mb-2" alt="{{ $campaign->name }}"
                        style="max-width: 639px">
                    <div class="card-body">
                        <h1 class="card-title">{{ $campaign->name }}</h1>
                        <hr>
                        <p class="card-text">{{ $campaign->description }}</p>
                        <hr>
                        <small class="text-muted">Dibuat: {{ $campaign->diffCreatedAtForHumans() }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Detail Donasi</h5>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <h3><strong>Rp.{{ $campaign->getTotalDonation() }}</strong></h3>
                            <p><i class="fa fa-users"></i> {{ $campaign->countTotalDonatur() }}</p>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ $campaign->donation_percentage }}%;"
                                aria-valuenow="{{ $campaign->donation_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <h5><strong>{{ $campaign->donation_percentage }}%</strong> dari Target
                                Rp.{{ $campaign->formatted_goal }}</h5>
                            <small class="text-muted"><i class="fa fa-clock"></i> {{ $campaign->remaining_days }} Hari
                                Lagi</small>
                        </div>
                        <hr>
                        <p><strong>Dibuat Oleh:</strong> {{ $campaign->user->name }}</p>

                        @if ($campaign->status == 'open')
                            <a href="{{ route('campaign.form', $campaign) }}" class="btn btn-outline-success w-100"><i
                                    class="fa-solid fa-hand-holding-dollar"></i>
                                Donasi</a>
                        @elseif ($campaign->status == 'close')
                            <button class="btn btn-secondary w-100" disabled>
                                <i class="fa fa-circle-exclamation"></i>
                                Ditutup
                            </button>
                        @elseif ($campaign->status == 'hold')
                            <button class="btn btn-warning w-100" disabled>
                                <i class="fa fa-clock"></i>
                                Ditahan
                            </button>
                        @endif
                    </div>
                </div>

                <div class="card shadow mb-4" style="overflow-y: auto; max-height: 350px">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Pesan</strong></h4>
                        <hr>
                        @php
                            $donaturFound = false;
                        @endphp

                        @forelse ($donaturs as $donatur)
                            @if ($donatur->message != null && 
                            $donatur->payment_status == 'paid' && $donatur->status == 'verified')
                                @php
                                    $donaturFound = true;
                                @endphp

                                <div class="d-flex justify-content-between">
                                    <p><strong>{{ $donatur->name }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>{{ $donatur->message }}</p>
                                </div>
                                <small class="text-muted"><i class="fa fa-clock"></i>
                                    {{ $donatur->diffUpdateAtForHumans() }}</small>
                                <hr>
                            @endif
                        @empty
                            <p class="text-center">Belum ada pesan</p>
                        @endforelse

                        @if (!$donaturFound)
                            <p class="text-center">Tidak ada data</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
