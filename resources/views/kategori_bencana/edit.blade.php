@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Edit Kategori
            </span>
            <span>
                <a href="{{ route('kategori_bencana.index') }}" class="btn btn-primary">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori_bencana.update', $kategori->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{ $kategori->nama }}" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection