@extends('dashboard.layouts.app', ['title' => 'Data Campaign'])

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 class="m-0 font-weight-bold text-dark">
                    {{ __('Data Campaign') }}
                </h3>

                <div class="btn-group" role="group" aria-label="User Actions">
                    <a href="{{ route('admin.campaign.create') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-circle-plus"></i>
                        <span class="text">{{ __('Create') }}</span>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table compact hover row-border nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Dekripsi</th>
                                <th>Gambar</th>
                                <th>Gambar Slide</th>
                                <th>Target</th>
                                <th>Tercapai</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th>Status</th>
                                <th>Pembuat</th>
                                <th>Tgl dibuat</th>
                                <th>Tgl diedit</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campaigns as $index => $campaign)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $campaign->name }}</td>
                                    <td>{{ Str::limit($campaign->description, 20) }}</td>
                                    <td><img src="{{ asset('storage/' . $campaign->image) }}" alt=""
                                            style="max-height: 100px"></td>
                                    <td><img src="{{ asset('storage/' . $campaign->carousel) }}" alt=""
                                            style="max-height: 100px"></td>
                                    <td>{{ $campaign->goal }}</td>
                                    <td>{{ $campaign->getTotalDonation() }}</td>
                                    <td>{{ $campaign->formatted_start_date }}</td>
                                    <td>{{ $campaign->formatted_end_date }}</td>
                                    <td>
                                        @if ($campaign->status == 'open')
                                            <button class="btn rounded btn-sm btn-success"><i class="fa fa-check"></i>
                                                Open</button>
                                        @elseif ($campaign->status == 'close')
                                            <button class="btn rounded btn-sm btn-danger"><i
                                                    class="fa fa-circle-exclamation"></i> Close</button>
                                        @elseif ($campaign->status == 'hold')
                                            <button class="btn rounded btn-sm btn-warning"><i class="fa fa-clock"></i>
                                                Hold</button>
                                        @endif
                                    </td>
                                    <td>{{ $campaign->user->name }}</td>
                                    <td>{{ $campaign->formatted_created_at }}</td>
                                    <td>{{ $campaign->formatted_updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.campaign.edit', $campaign) }}"
                                            class="btn rounded btn-sm btn-success">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.campaign.delete', $campaign) }}"
                                            class="btn rounded btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
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
