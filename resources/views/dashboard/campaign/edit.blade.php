@extends('dashboard.layouts.app', ['title' => 'Edit Data Campaign'])

@push('css')
@endpush

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
                        <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top mb-2" alt="{{ $campaign->name }}"
                            style="max-width: 639px">
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
                        <h3 class="card-title">Edit Data</h3>
                        <hr>
                        <form action="{{ route('admin.campaign.update', $campaign) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <label for="name" class="form-label">Nama Campaign</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $campaign->name }}" required>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="goal" class="form-label">Target Donasi (Rp)</label>
                                    <input type="number" class="form-control" id="goal" name="goal"
                                        value="{{ $campaign->goal }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Campaign</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $campaign->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Campaign (*jpg/jpeg/png) | Disarankan:
                                    900px x
                                    600px</label>
                                <input class="form-control" type="file" id="image" name="image"
                                    accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="mb-3">
                                <label for="carousel" class="form-label">Gambar Slide (*jpg/jpeg/png) | Disarankan: 1200px x
                                    400px</label>
                                <input class="form-control" type="file" id="carousel" name="carousel"
                                    accept=".jpg, .jpeg, .png">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                                    <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                        value="{{ date('Y-m-d\TH:i', strtotime($campaign->start_date)) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_date" class="form-label">Tanggal Selesai</label>
                                    <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                        value="{{ date('Y-m-d\TH:i', strtotime($campaign->end_date)) }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="open" {{ $campaign->status === 'open' ? 'selected' : '' }}>Buka
                                    </option>
                                    <option value="close" {{ $campaign->status === 'close' ? 'selected' : '' }}>Tutup
                                    </option>
                                    <option value="hold" {{ $campaign->status === 'hold' ? 'selected' : '' }}>
                                        Tangguhkan
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Campaign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
