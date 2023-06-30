@extends('layout')
@section('title', 'Detail Karyawan')
@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-bg-primary d-inline-block">Detail Karyawan</h3>
    </div>
    <div class="card-body">
        <div class="container px-2">
            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label-sm">Nama Lengkap</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $biodata->nama }}"
                        disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tempat_lahir" class="col-sm-3 col-form-label-sm">Tempat Lahir</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                        value="{{ $biodata->tempat_lahir }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal_lahir" class="col-sm-3 col-form-label-sm">Tanggal Lahir</label>
                <div class="col-sm">
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                        value="{{ $biodata->tanggal_lahir }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="gender" class="col-sm-3 col-form-label-sm">Jenis Kelamin</label>
                <div class="col-sm">
                    <select name="gender" id="gender" class="form-select" disabled>
                        <option>Pilih Jenis Kelamin</option>
                        <option value="1" {{ ('1' == $biodata->gender)? 'selected' : null }}>Laki-laki</option>
                        <option value="2" {{ ('2' == $biodata->gender)? 'selected' : null }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="agama" class="col-sm-3 col-form-label-sm">Agama</label>
                <div class="col-sm">
                    <select name="agama" id="agama" class="form-select" disabled>
                        <option>Pilih Agama</option>
                        <option value="islam" {{ ('islam' == $biodata->agama)? 'selected' : null }}>Islam</option>
                        <option value="katolik" {{ ('katolik' == $biodata->agama)? 'selected' : null }}>Katolik
                        </option>
                        <option value="kristen" {{ ('kristen' == $biodata->agama)? 'selected' : null }}>Kristen
                        </option>
                        <option value="hindu" {{ ('hindu' == $biodata->agama)? 'selected' : null }}>Hindu</option>
                        <option value="budha" {{ ('budha' == $biodata->agama)? 'selected' : null }}>Budha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat" class="col-sm-3 col-form-label-sm">Alamat Lengkap</label>
                <div class="col-sm">
                    <textarea name="alamat" id="alamat" rows="4" class="form-control" disabled>{{ $biodata->alamat }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nomer_hp" class="col-sm-3 col-form-label-sm">Nomer Handphone</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="nomer_hp" id="nomer_hp"
                        value="{{ $biodata->nomer_hp }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label-sm">Email</label>
                <div class="col-sm">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $biodata->email }}"
                        disabled>
                </div>
            </div>
            <table class="table table-bordered" id="tabel_pendidikan">
                <thead>
                    <tr class="bg-body-tertiary">
                        <th colspan="7" class="text-center"><label class="text-muted text-center">Pendidikan</label>
                        </th>
                    </tr>
                    <tr class=" table-success text-center align-middle">
                        <th style="width: 150px">Tingkat</th>
                        <th style="width: 300px">Nama Tempat</th>
                        <th>Kota</th>
                        <th style="width: 100px">Tahun Mulai</th>
                        <th style="width: 100px">Tahun Selesai</th>
                        <th>Jurusan</th>
                        <th style="width: 100px">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($biodata->pendidikan as $pendidikan)
                    <tr class="align-midle">
                        <td class="row-group">
                            <select name="tingkat[]" id="tingkat" class="form-select" disabled>
                                <option value="sd" {{ ('sd' == $pendidikan->tingkat) ? 'selected' : null }}>SD</option>
                                <option value="smp" {{ ('smp' == $pendidikan->tingkat) ? 'selected' : null }}>SMP</option>
                                <option value="sma" {{ ('sma' == $pendidikan->tingkat) ? 'selected' : null }}>SMA</option>
                                <option value="diploma" {{ ('diploma' == $pendidikan->tingkat) ? 'selected' : null }}>Diploma</option>
                                <option value="sarjana" {{ ('sarjana' == $pendidikan->tingkat) ? 'selected' : null }}>Sarjana</option>
                                <option value="master" {{ ('master' == $pendidikan->tingkat) ? 'selected' : null }}>Master</option>
                            </select>
                        </td>
                        <td><input type="text" name="nama_tempat[]" class="form-control"
                                disabled value="{{ $pendidikan->nama_tempat }}"></td>
                        <td><input type="text" name="kota[]" class="form-control"
                                disabled value="{{ $pendidikan->kota }}"></td>
                        <td><input type="number" min="1900" max="2099" step="1" name="mulai[]" class="form-control"
                                disabled value="{{ $pendidikan->mulai }}"></td>
                        <td><input type="number" min="1900" max="2099" step="1" name="selesai[]" class="form-control"
                                disabled value="{{ $pendidikan->selesai }}"></td>
                        <td><input type="text" name="jurusan[]" class="form-control"
                                disabled value="{{ $pendidikan->jurusan }}"></td>
                        <td><input type="text" name="nilai[]" class="form-control"
                                disabled value="{{ $pendidikan->nilai }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
