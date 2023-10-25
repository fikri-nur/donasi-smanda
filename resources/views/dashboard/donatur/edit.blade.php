@extends('dashboard.layouts.app', ['title' => 'Validasi Donatur'])

@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.donatur.index') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i>
            Kembali</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Bukti Pembayaran</h3>
                        <hr>
                        <a href="{{ asset('storage/' . $donatur->payment_proof) }}" target="_blank">
                            <img src="{{ asset('storage/' . $donatur->payment_proof) }}" alt="" style="max-width: 325px;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Validasi Donasi</h3>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-4">Nama:</dt>
                            <dd class="col-sm-8">{{ $donatur->name }}</dd>

                            <dt class="col-sm-4">Username:</dt>
                            <dd class="col-sm-8">
                                @if (isset($donatur->user_id))
                                    {{ $donatur->user->name }}
                                @else
                                    <i class="fa fa-user-slash"></i>Tidak ada
                                @endif
                            </dd>

                            <dt class="col-sm-4">Asal:</dt>
                            <dd class="col-sm-8">{{ $donatur->kategori }}</dd>

                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">{{ $donatur->email }}</dd>

                            <dt class="col-sm-4">No Telp:</dt>
                            <dd class="col-sm-8">{{ $donatur->phone_no }}</dd>

                            <dt class="col-sm-4">Campaign:</dt>
                            <dd class="col-sm-8">{{ $donatur->campaign->name }}</dd>

                            <dt class="col-sm-4">Nominal:</dt>
                            <dd class="col-sm-8">{{ $donatur->amount }}</dd>

                            <dt class="col-sm-4">Pesan:</dt>
                            <dd class="col-sm-8">{{ Str::limit($donatur->message, 20) }}</dd>

                            <dt class="col-sm-4">Rekening:</dt>
                            <dd class="col-sm-8">{{ $donatur->rekening->nama_bank }}</dd>

                            <dt class="col-sm-4">Status Pembayaran:</dt>
                            <dd class="col-sm-8">{{ $donatur->payment_status }}</dd>

                            <dt class="col-sm-4">Tanggal Pembayaran:</dt>
                            <dd class="col-sm-8">{{ $donatur->payment_date }}</dd>

                            <dt class="col-sm-4">Status Donasi:</dt>
                            <dd class="col-sm-8">{{ $donatur->status }}</dd>

                            <dt class="col-sm-4">Tanggal Verifikasi:</dt>
                            <dd class="col-sm-8">
                                {{ isset($donatur->verified_at) ? $donatur->verified_at : 'Belum Verifikasi' }}</dd>

                            <dt class="col-sm-4">Diverifikasi Oleh:</dt>
                            <dd class="col-sm-8">
                                {{ isset($donatur->verified_by) ? $donatur->verified_by : 'Belum Verifikasi' }}
                            </dd>
                        </dl>

                        <form action="{{ route('admin.donatur.update', $donatur->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="payment_status" class="form-label">Status Pembayaran</label>
                                <select class="form-select" id="payment_status" name="payment_status" required>
                                    <option value="paid" {{ $donatur->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="failed" {{ $donatur->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                                    <option value="pending" {{ $donatur->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="status" class="form-label">Status Donasi</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="verified" {{ $donatur->status == 'verified' ? 'selected' : '' }}>Verified</option>
                                    <option value="unverified" {{ $donatur->status == 'unverified' ? 'selected' : '' }}>Unverified</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Validasi Donatur</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
