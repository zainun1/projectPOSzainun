@extends('layouts.template')

@section('tambahanCSS')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('judulh1','Admin - Category')
@section('judulh3','Category')

@section('konten')

<div class="row">

    <div class="col-md-4">

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Input Category</h3>
            </div>

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            placeholder="Nama Kategori">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>

                        <textarea name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Deskripsi"></textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-success float-right">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card card-info">

            <div class="card-header">
                <h3 class="card-title">Data Category</h3>
            </div>

            <div class="card-body">

                <table id="example1"
                    class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($data as $dt)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->name }}</td>
                            <td>{{ $dt->description }}</td>

                            <td>

                                <a href="{{ route('kategori.edit',$dt->id) }}"
                                    class="btn btn-warning">

                                    <i class="fas fa-edit"></i>

                                </a>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@section('tambahanJS')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection

@section('tambahScript')

<script>
$(function() {

    $("#example1").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
    });

});

@if(Session::get('success'))
toastr.success("{{ Session::get('success') }}");
@endif

@if(Session::get('updated'))
toastr.warning("{{ Session::get('updated') }}");
@endif
</script>

@endsection