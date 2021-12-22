@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Edit data bencana
            </span>
            <span>
                <a href="{{ route('bencana.index') }}" class="btn btn-primary">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('bencana.update', $bencana->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{ $bencana->nama }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="kategori_bencana_id" id="" class="form-control">
                        <option value="">Pilih Kategori...</option>
                        @foreach ($kategoris as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $bencana->kategori_bencana_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection