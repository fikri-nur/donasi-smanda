@extends('dashboard.layouts.app', ['title' => 'Konfirmasi Hapus Rekening'])

@section('content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Konfirmasi Hapus Rekening</h3>
                <p>Apakah Anda yakin ingin menghapus rekening berikut?</p>
                
                <dl class="row">
                    <dt class="col-sm-4">Nama Bank:</dt>
                    <dd class="col-sm-8">{{ $rekening->nama_bank }}</dd>

                    <dt class="col-sm-4">Nama Pemilik Rekening:</dt>
                    <dd class="col-sm-8">{{ $rekening->nama_pemilik }}</dd>

                    <dt class="col-sm-4">Nomor Rekening:</dt>
                    <dd class="col-sm-8">{{ $rekening->nomor_rekening }}</dd>
                </dl>

                <form action="{{ route('admin.rekening.destroy', $rekening) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="{{ route('admin.rekening.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
