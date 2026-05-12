@extends('layouts.template')

@section('judulh1','Admin - Category')
@section('judulh3','Category')

@section('konten')

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
                        name="name"
                        class="form-control"
                        placeholder="Nama Kategori">
                </div>

                <div class="form-group">

                    <label>Deskripsi</label>

                    <textarea name="description"
                        rows="5"
                        class="form-control"
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

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th width="120">Aksi</th>
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
                                class="btn btn-warning btn-sm">

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

@endsection