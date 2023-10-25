@extends('dashboard.layouts.app', ['title' => 'Konfirmasi Hapus Campaign'])

@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i>
            Kembali</a>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Gambar</h3>
                        <hr>
                        <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top mb-2"
                            alt="{{ $campaign->name }}" style="max-width: 639px">
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Carousel (Slide)</h3>
                        <hr>
                        <img src="{{ asset('storage/' . $campaign->carousel) }}" class="card-img-top mb-2"
                            alt="{{ $campaign->carousel }}" style="max-width: 639px">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Konfirmasi Hapus Campaign</h3>
                        <p>Apakah Anda yakin ingin menghapus campaign berikut?</p>
                        <hr>

                        <dl class="row">
                            <dt class="col-sm-4">Nama Campaign:</dt>
                            <dd class="col-sm-8">{{ $campaign->name }}</dd>

                            <dt class="col-sm-4">Deskripsi:</dt>
                            <dd class="col-sm-8">{{ $campaign->description }}</dd>

                            <dt class="col-sm-4">Target Donasi:</dt>
                            <dd class="col-sm-8">Rp.{{ $campaign->formatted_goal }}</dd>

                            <dt class="col-sm-4">Tanggal Mulai:</dt>
                            <dd class="col-sm-8">{{ $campaign->formatted_start_date }}</dd>

                            <dt class="col-sm-4">Tanggal Selesai:</dt>
                            <dd class="col-sm-8">{{ $campaign->formatted_end_date }} ({{ $campaign->remaining_days }} Hari
                                Lagi)</dd>

                            <dt class="col-sm-4">Status:</dt>
                            <dd class="col-sm-8">{{ $campaign->status }}</dd>

                            <dt class="col-sm-4">Pembuat:</dt>
                            <dd class="col-sm-8">{{ $campaign->user->name }}</dd>

                            <dt class="col-sm-4">Tanggal Dibuat:</dt>
                            <dd class="col-sm-8">{{ $campaign->formatted_created_at }}
                                ({{ $campaign->diffCreatedAtForHumans() }})</dd>

                            <dt class="col-sm-4">Tanggal Diedit:</dt>
                            <dd class="col-sm-8">{{ $campaign->formatted_updated_at }}</dd>
                        </dl>

                        <form action="{{ route('admin.campaign.destroy', $campaign) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
