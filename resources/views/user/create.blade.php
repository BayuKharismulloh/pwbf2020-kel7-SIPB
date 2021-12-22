@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Buat User
            </span>
            <span>
                <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" id="" class="form-control">
                        <option value="">Pilih Role...</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kecamatan</label>
                    <select name="kecamatan_id" id="" class="form-control">
                        <option value="">Pilih Kecamatan...</option>
                        @foreach ($kecamatans as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
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