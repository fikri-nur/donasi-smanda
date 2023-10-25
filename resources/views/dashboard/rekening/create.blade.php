@extends('dashboard.layouts.app', ['title' => 'Tambah Data Rekening'])
@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.rekening.index') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-dark">
                    {{ __('Tambah Data Rekening') }}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rekening.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Masukkan nama bank..." required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nama_pemilik" class="form-label">Nama Pemilik Rekening</label>
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan nama pemilik rekening..." required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Masukkan nomor rekening..." required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Rekening</button>
                </form>
            </div>
        </div>
    </div>
@endsection