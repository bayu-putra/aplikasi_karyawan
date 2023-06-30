@extends('layout')
@section('header-title', 'Data Karyawan')
@section('title', 'Data Karyawan')
@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-bg-primary d-inline-block">Data Karyawan</h3>
        <a href="{{ route('biodata.create') }}" class="btn btn-sm btn-success float-end">Tambah Data</a>
    </div>
    <div class="card-body">
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomer Handphone</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th class="text-center" style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biodatas as $biodata)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $biodata->nama }}</td>
                    <td>{{ $biodata->alamat }}</td>
                    <td>{{ $biodata->nomer_hp }}</td>
                    <td>{{ $biodata->email }}</td>
                    <td>{{ ($biodata->gender == '1') ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="text-center">
                        <a href="{{ route('biodata.show', $biodata->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('biodata.edit', $biodata->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('biodata.destroy', $biodata->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('yakin hapus data ?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
