@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Bantu Siapa Hari Ini?</h1>

        <div class="row justify-content-end mb-4">
            <div class="col-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari campaign atau donasi...">
                    <button class="btn btn-sm btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($campaigns as $campaign)
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
