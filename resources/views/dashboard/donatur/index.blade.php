@extends('dashboard.layouts.app', ['title' => 'Data Donatur'])

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 class="m-0 font-weight-bold text-dark">
                    {{ __('Data Donatur') }}
                </h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table compact hover row-border nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Asal</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Campaign</th>
                                <th>Nominal</th>
                                <th>Pesan</th>
                                <th>Rekening</th>
                                <th>Stts Pmbyrn</th>
                                <th>Tgl Pmbyrn</th>
                                <th>Bukti Pmbyrn</th>
                                <th>Status</th>
                                <th>Tgl Verifikasi</th>
                                <th>Oleh</th>
                                <th>Username</th>
                                <th>Validasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donaturs as $index => $donatur)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $donatur->name }}</td>
                                    <td>{{ $donatur->kategori }}</td>
                                    <td>{{ $donatur->email }}</td>
                                    <td>{{ $donatur->phone_no }}</td>
                                    <td>{{ $donatur->campaign->name }}</td>
                                    <td>{{ $donatur->amount }}</td>
                                    <td>{{ Str::limit($donatur->message, 20) }}</td>
                                    <td>{{ $donatur->rekening->nama_bank }}</td>
                                    <td>
                                    @if ($donatur->payment_status == 'paid')
                                        <button class="btn rounded btn-sm btn-success"><i class="fa fa-check"></i> Paid</button>
                                    @elseif ($donatur->payment_status == 'pending')
                                    <button class="btn rounded btn-sm btn-warning"><i class="fa fa-clock"></i> Pending</button>
                                    @elseif ($donatur->payment_status == 'failed')
                                    <button class="btn rounded btn-sm btn-danger"><i class="fa-solid fa-circle-exclamation"></i> Failed</button>
                                    @endif
                                </td>
                                    <td>{{ $donatur->payment_date }}</td>
                                    <td><a href="{{ asset('storage/' . $donatur->payment_proof) }}" target="_blank"><img
                                                src="{{ asset('storage/' . $donatur->payment_proof) }}" alt=""
                                                style="max-height: 100px;"></a></td>
                                    <td>{{ $donatur->status }}</td>
                                    <td>{{ isset($donatur->verified_by) ? $donatur->verified_by : 'Belum Verifikasi' }}
                                    </td>
                                    <td>{{ isset($donatur->verified_at) ? $donatur->verified_at : 'Belum Verifikasi' }}
                                    </td>
                                    @if (isset($donatur->user_id))
                                        <td>{{ $donatur->user->name }}</td>
                                    @else
                                        <td><i class="fa fa-user-slash"></i>Tidak ada</td>
                                    @endif
                                    <td>
                                        @if ($donatur->status == 'verified')
                                            <a href="{{ route('admin.donatur.edit', $donatur) }}"
                                                class="btn rounded btn-sm btn-success">
                                                <i class="fa fa-check"></i> Verified
                                            @else
                                                <a href="{{ route('admin.donatur.edit', $donatur) }}"
                                                    class="btn rounded btn-sm btn-danger">
                                                    <i class="fa fa-xmark"></i> Unverified
                                        @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- Table Footer --}}
                        <tfoot>
                            <tr>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
