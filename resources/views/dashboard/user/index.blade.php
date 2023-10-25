@extends('dashboard.layouts.app', ['title' => 'Data User'])

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 class="m-0 font-weight-bold text-dark">
                    {{ __('Data User') }}
                </h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table compact hover row-border nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Tgl dibuat</th>
                                <th>Tgl diedit</th>
                                {{-- <th>Edit</th>
                                <th>Hapus</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->phone_no }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->formatted_created_at }}</td>
                                    <td>{{ $user->formatted_updated_at }}</td>
                                    {{-- <td>
                                        <a href="{{ route('admin.user.edit', $user) }}"
                                            class="btn rounded btn-sm btn-success">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.destroy', $user) }}"
                                            class="btn rounded btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Hapus
                                        </a>
                                    </td> --}}
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
