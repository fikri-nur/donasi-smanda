@extends('dashboard.layouts.app', ['title' => 'Data Rekening'])

@section('content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 class="m-0 font-weight-bold text-dark">
                    {{ __('Data Rekening') }}
                </h3>

                <div class="btn-group" role="group" aria-label="User Actions">
                    <a href="{{ route('admin.rekening.create') }}" class="btn btn-sm btn-outline-secondary">
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
                                <th>Bank</th>
                                <th>Nama Rekening</th>
                                <th>Nomor Rek</th>
                                <th>Tgl dibuat</th>
                                <th>Tgl diedit</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekenings as $index => $rekening)
                                <tr>
                                    <td>{{ $rekening->id }}</td>
                                    <td>{{ $rekening->nama_bank }}</td>
                                    <td>{{ $rekening->nama_pemilik }}</td>
                                    <td>{{ $rekening->nomor_rekening }}</td>
                                    <td>{{ $rekening->formatted_created_at }}</td>
                                    <td>{{ $rekening->formatted_updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.rekening.edit', $rekening) }}"
                                            class="btn rounded btn-sm btn-success">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.rekening.delete', $rekening) }}"
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
