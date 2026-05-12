@extends('layouts.template')

@section('judulh1','Edit Kategori')
@section('judulh3','Edit Kategori')

@section('konten')

<div class="col-md-6">

    <div class="card card-warning">

        <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
        </div>

        <form action="{{ route('kategori.update',$kategori->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">

                    <label>Nama Kategori</label>

                    <input type="text"
                        name="name"
                        class="form-control"
                        value="{{ $kategori->name }}">

                </div>

                <div class="form-group">

                    <label>Deskripsi</label>

                    <textarea name="description"
                        class="form-control"
                        rows="5">{{ $kategori->description }}</textarea>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-warning">
                    Update
                </button>

                <a href="{{ route('kategori.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection