@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Buat Role
            </span>
            <span>
                <a href="{{ route('role.index') }}" class="btn btn-primary">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection