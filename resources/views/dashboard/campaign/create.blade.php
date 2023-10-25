@extends('dashboard.layouts.app', ['title' => 'Tambah Data Campaign'])

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i>
            Kembali</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-dark">
                    {{ __('Tambah Data Campaign') }}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.campaign.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="name" class="form-label">Nama Campaign</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Campaign..." required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="goal" class="form-label">Target Donasi (Rp)</label>
                            <input type="number" class="form-control" id="goal" name="goal" placeholder="Contoh: 1000000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Campaign</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Berikan deskripsi tentang campaign tersebut" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Gambar Campaign (*jpg/jpeg/png) | Disarankan: 900px x 600px</label>
                            <input class="form-control" type="file" id="image" name="image" accept=".jpg, .jpeg, .png"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="carousel" class="form-label">Gambar Slide (*jpg/jpeg/png) | Disarankan: 1200px x 400px</label>
                            <input class="form-control" type="file" id="carousel" name="carousel" accept=".jpg, .jpeg, .png"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="open">Buka</option>
                                <option value="close">Tutup</option>
                                <option value="hold">Tangguhkan</option>
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Tambah Campaign</button>
                </form>
            </div>
        </div>
    </div>
@endsection
