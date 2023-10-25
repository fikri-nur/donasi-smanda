@extends('layouts.app', ['title' => 'Tentang Kami'])

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tentang Kami</h1>

        <div class="row">
            <div class="col-md-2 mb-4">
                <img src="{{ asset('assets/img/logo/logo navbar.png') }}" alt="Logo Sekolah"
                    class="img-fluid mb-3 rounded" style="max-height: 168px">
            </div>
            <div class="col-md-4 mb-4">
                <h2>Informasi Sekolah</h2>
                <p>SMAN 1 Pandaan adalah sekolah terkemuka yang didirikan pada 23 Februari 1974 di Kabupaten Pasuruan.
                    Berlokasi di Jl. Dr. Sutomo, dusun Sukun, desa Sumbergedang, kecamatan Pandaan, sekolah ini cepat
                    menjadi favorit di Kabupaten Pasuruan. Meskipun awalnya terbatas dalam fasilitas, SMAN 1 Pandaan telah
                    berkembang pesat menjadi pusat pendidikan unggul.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h2>Informasi Website Donasi</h2>
                <p>Website Donasi adalah tempat di mana kebaikan merajut harapan. Di sini, kami menggalang dana untuk
                    berbagai penyebab mul noble. Dari membantu pendidikan hingga mendukung penyembuhan, setiap sumbangan
                    Anda memiliki dampak besar. Bergabunglah dengan kami dalam membentuk dunia yang lebih baik dan
                    berdayakan perubahan melalui donasi Anda.</p>
            </div>
        </div>

        <h2 class="mt-5 mb-4">Dokumentasi Kami</h2>
        <div class="row">
            <div class="col-md-3 mb-3">
                <img src="https://placehold.co/261x261" alt="Gambar 1" class="img-fluid rounded" style="max-width: 261px">
            </div>
            <div class="col-md-3 mb-3">
                <img src="https://placehold.co/261x261" alt="Gambar 2" class="img-fluid rounded" style="max-width: 261px">
            </div>
            <div class="col-md-3 mb-3">
                <img src="https://placehold.co/261x261" alt="Gambar 3" class="img-fluid rounded" style="max-width: 261px">
            </div>
            <div class="col-md-3 mb-3">
                <img src="https://placehold.co/261x261" alt="Gambar 4" class="img-fluid rounded" style="max-width: 261px">
            </div>
        </div>
    </div>
@endsection
