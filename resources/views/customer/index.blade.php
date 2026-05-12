@extends('layouts.appadmin')

@section('content')

<div class="container mt-4">

    <h3 class="mb-4">Data Customer</h3>

    <div class="card">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <span>Data Customer</span>

            <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm">
                + Tambah Customer
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $pelanggan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelanggan->name }}</td>
                        <td>{{ $pelanggan->phone }}</td>

                        <td>

                            <!-- Tombol Edit -->
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>

                            <!-- Tombol Detail -->
                            <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                               class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>

                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data Customer Kosong
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection