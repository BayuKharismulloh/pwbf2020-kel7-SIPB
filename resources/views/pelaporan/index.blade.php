@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pelaporan.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
            {{-- <form action="{{ route('pelaporan.search') }}" method="get"></form> --}}
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelapor</th>
                        <th scope="col">Nama Bencana</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelaporans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$item->user->name}}
                            </td>
                            <td>
                                {{$item->bencana->nama}}
                            </td>
                            <td>
                                {{
                                    Carbon\Carbon::parse($item->waktu)->format('d M Y')
                                }}
                            </td>
                            <td>
                                <div class="badge badge-info text-uppercase">
                                    {{$item->status}}
                                </div>
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('pelaporan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pelaporan.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-2">Hapus</button>
                                </form>
                                <a href="{{ route('pelaporan.show', $item->id) }}" class="btn btn-info">Detail</a>
                             @if($item->status == 'proses' && Auth::user()->role_id != 3)
                                <form action="{{ route('pelaporan.validasi', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="diverifikasi">
                                    <button class="btn btn-success mx-2">Validasi</button>

                                    </form>
                            @endif
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection