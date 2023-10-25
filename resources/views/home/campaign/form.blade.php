@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('all-campaign') }}" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-7">
                <!-- Card untuk menampilkan informasi campaign -->
                <div class="card shadow mb-4">
                    <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top mb-2" alt="{{ $campaign->name }}"
                        style="max-width: 639px">
                    <div class="card-body">
                        <h1 class="card-title">{{ $campaign->name }}</h1>
                        <hr>
                        <p class="card-text">{{ $campaign->description }}</p>
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
                        <small class="text-muted"><strong>Dibuat Oleh:</strong> {{ $campaign->user->name }} ({{  $campaign->diffCreatedAtForHumans() }})</small>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Langkah-langkah Melakukan Donasi</h5>
                        <hr>
                        <ol>
                            <li><strong>Pilih Metode Pembayaran:</strong> Pilih salah satu metode pembayaran yang tersedia.</li>
                            <li><strong>Lakukan Transfer:</strong> Lakukan transfer sesuai dengan metode pembayaran yang dipilih. Pastikan untuk mendokumentasikan atau membuat screenshot bukti pembayaran.</li>
                            <li><strong>Isi Data Diri:</strong> Isi formulir di bawah ini dengan data diri Anda.</li>
                            <li><strong>Tunggu Validasi:</strong> Admin kami akan melakukan validasi dan menghubungi Anda dalam waktu 2 x 24 jam.</li>
                        </ol>
                    </div>
                </div>
                <!-- Card untuk form data diri donatur -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Form Donasi</h5>
                        <hr>
                        <form action="{{ route('campaign.donate', $campaign) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Field Metode Pembayaran -->
                            <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                                    @foreach ($rekenings as $rekening)
                                        <option value="{{ $rekening->id }}">
                                            {{ $rekening->nama_bank }} - Rek:{{ $rekening->nomor_rekening }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Field Nama -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama (Opsional)</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukkan nama anda...">
                            </div>
                            <!-- Field Kategori -->
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value="internal">Internal (Murid, guru, atau pegawai SMANDA)</option>
                                    <option value="eksternal">Eksternal (Masyarakat Umum)</option>
                                </select>
                            </div>
                            <!-- Field Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email (Opsional)</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email@anda.com" value="{{ isset($user->email) ? $user->email : '' }}">
                            </div>
                            <!-- Field Nomor Telepon -->
                            <div class="mb-3">
                                <label for="phone_no" class="form-label">Nomor Telepon</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+62</div>
                                    </div>
                                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Contoh: 85123456789"
                                        value="{{ isset($user->phone_no) ? $user->phone_no : '' }}" required>
                                </div>
                            </div>
                            <!-- Field Jumlah Donasi -->
                            <div class="mb-3">
                                <label for="amount" class="form-label">Jumlah Donasi (Rp)</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Contoh: 100000" required>
                            </div>
                            <!-- Field Upload Bukti Pembayaran -->
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran (*jpg/jpeg/png)</label>
                                <input class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran"
                                    required>
                            </div>

                            <!-- Field Pesan -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan (Opsional)</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-outline-primary w-100">Donasi Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
