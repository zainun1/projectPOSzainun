@extends('layouts.template')

@section('tambahanCSS')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection


@section('judulh1')
Admin - Customer
@endsection


@section('konten')

<div class="col-md-12">

    <div class="card card-info">

        <div class="card-header">

            <h3 class="card-title">
                Data Customer
            </h3>

            <div class="card-tools">

                <a href="{{ route('pelanggan.create') }}"
                    class="btn btn-success btn-sm">

                    <i class="fas fa-plus"></i>
                    Tambah Customer

                </a>

            </div>

        </div>

        <div class="card-body">

            <table id="example1"
                class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($data as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->name }}</td>

                        <td>{{ $item->phone }}</td>

                        <td>

                            <!-- Tombol Edit -->
                            <a href="{{ route('pelanggan.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <!-- Tombol Detail -->
                            <a href="{{ route('pelanggan.show', $item->id) }}"
                                class="btn btn-success btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@section('tambahanJS')

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

@endsection


@section('tambahScript')

<script>

$(function () {

    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    });

});

</script>

@endsection