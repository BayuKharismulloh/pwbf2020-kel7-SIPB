@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pelaporan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Pelapor</label>
                <input type="text" name="" value="{{ $pelaporan->user->name }}" id="" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <input type="text" name="" value="{{ $pelaporan->status }}" id="" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Kecamatan</label>
                <input type="text" name="" value="{{ $pelaporan->user->kecamatan->nama }}" id="" class="form-control" disabled>
            </div>
                <div class="form-group">
                    <label for="">Nama Bencana</label>
                    <input type="text" value="{{ $pelaporan->bencana->nama }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="date" value="{{ $pelaporan->waktu }}" name="waktu" id="" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" disabled>{{ $pelaporan->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <img src="{{ Storage::url($pelaporan->foto) }}" alt="" width="500">
                </div>
                @if ($pelaporan->status == 'proses' && Auth::user()->role_id != 3)
                <div class="form-group">
                    <form action="{{ route('pelaporan.validasi', $pelaporan->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="diverifikasi">
                    <button class="btn btn-success">Validasi</button>

                    </form>
                </div>
                @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Detail Korban
        </div>
        <div class="card-body">
            @if ($pelaporan->status != 'proses')
            <form action="{{ route('pelaporan.detail') }}" method="POST">
                @csrf
                <input type="hidden" name="pelaporan_id" value="{{ $pelaporan->id }}">
                <div class="form-group">
                    <label for="">Nama Korban</label>
                    <input type="text" name="nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="number" name="nik" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" name="umur" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kondisi</label>
                    <input type="text" name="kondisi" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endif
        </div>
        <div class="card-body">
            @if ($pelaporan->status == 'proses')
                Pelaporan Masih Dalam Proses
            @else
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($korbans as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    {{ $item->nik }}
                                </td>
                                <td>
                                    {{ $item->kondisi }}
                                </td>
                                <td>
                                    {{ $item->umur }}
                                </td>
                                <td>
                                    <form action="{{ route('pelaporan.detailHapus', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection