@extends('layout')
@section('title', 'Edit Data Karyawan')
@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-bg-primary d-inline-block">Edit Data Karyawan</h3>
    </div>
    <div class="card-body">
        <div class="container px-2">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('biodata.update', $biodata->id) }}" id="form_edit_data" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="nama" class="col-sm-3 col-form-label-sm">Nama Lengkap</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $biodata->nama) }}"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label-sm">Tempat Lahir</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                            value="{{ old('tempat_lahir', $biodata->tempat_lahir) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label-sm">Tanggal Lahir</label>
                    <div class="col-sm">
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $biodata->tanggal_lahir) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gender" class="col-sm-3 col-form-label-sm">Jenis Kelamin</label>
                    <div class="col-sm">
                        <select name="gender" id="gender" class="form-select" required>
                            <option>Pilih Jenis Kelamin</option>
                            <option value="1" {{ ('1' == old('gender', $biodata->gender))? 'selected' : null }}>Laki-laki</option>
                            <option value="2" {{ ('2' == old('gender', $biodata->gender))? 'selected' : null }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agama" class="col-sm-3 col-form-label-sm">Agama</label>
                    <div class="col-sm">
                        <select name="agama" id="agama" class="form-select" required>
                            <option>Pilih Agama</option>
                            <option value="islam" {{ ('islam' == old('agama', $biodata->agama))? 'selected' : null }}>Islam</option>
                            <option value="katolik" {{ ('katolik' == old('agama', $biodata->agama))? 'selected' : null }}>Katolik
                            </option>
                            <option value="kristen" {{ ('kristen' == old('agama', $biodata->agama))? 'selected' : null }}>Kristen
                            </option>
                            <option value="hindu" {{ ('hindu' == old('agama', $biodata->agama))? 'selected' : null }}>Hindu</option>
                            <option value="budha" {{ ('budha' == old('agama', $biodata->agama))? 'selected' : null }}>Budha</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label-sm">Alamat Lengkap</label>
                    <div class="col-sm">
                        <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ old('alamat', $biodata->alamat) }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nomer_hp" class="col-sm-3 col-form-label-sm">Nomer Handphone</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" name="nomer_hp" id="nomer_hp"
                            value="{{ old('nomer_hp', $biodata->nomer_hp) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label-sm">Email</label>
                    <div class="col-sm">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $biodata->email) }}"
                            required>
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
                            <th style="width: 100px" colspan="2">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (old('tingkat'))
                        @foreach (old('tingkat') as $x)
                        <tr class="align-midle">
                            <input type="hidden" name="pendidikan_id[]" value="{{ old("pendidikan_id.$loop->index") }}">
                            <td class="row-group">
                                <select name="tingkat[]" id="tingkat" class="form-select">
                                    <option value="sd" {{ ('sd' == $x) ? 'selected' : null }}>SD</option>
                                    <option value="smp" {{ ('smp' == $x) ? 'selected' : null }}>SMP</option>
                                    <option value="sma" {{ ('sma' == $x) ? 'selected' : null }}>SMA</option>
                                    <option value="diploma" {{ ('diploma' == $x) ? 'selected' : null }}>Diploma</option>
                                    <option value="sarjana" {{ ('sarjana' == $x) ? 'selected' : null }}>Sarjana</option>
                                    <option value="master" {{ ('master' == $x) ? 'selected' : null }}>Master</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="nama_tempat[]" class="form-control"
                                value="{{ old("nama_tempat.$loop->index") }}">
                            </td>
                            <td>
                                <input type="text" name="kota[]" class="form-control"
                                value="{{ old("kota.$loop->index") }}">
                            </td>
                            <td>
                                <input type="number" min="1900" max="2099" step="1" name="mulai[]" class="form-control"
                                value="{{ old("mulai.$loop->index") }}">
                            </td>
                            <td>
                                <input type="number" min="1900" max="2099" step="1" name="selesai[]" class="form-control"
                                value="{{ old("selesai.$loop->index") }}">
                            </td>
                            <td>
                                <input type="text" name="jurusan[]" class="form-control"
                                value="{{ old("jurusan.$loop->index") }}">
                            </td>
                            <td>
                                <input type="text" name="nilai[]" class="form-control"
                                value="{{ old("nilai.$loop->index") }}">
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @foreach ($biodata->pendidikan as $pendidikan)
                        <tr class="align-midle">
                            <input type="hidden" name="pendidikan_id[]" value="{{ old("pendidikan_id.$loop->index", $pendidikan->id) }}">
                            <td class="row-group">
                                <select name="tingkat[]" id="tingkat" class="form-select">
                                    <option value="sd" {{ ('sd' == old("tingkat.$loop->index", $pendidikan->tingkat)) ? 'selected' : null }}>SD</option>
                                    <option value="smp" {{ ('smp' == old("tingkat.$loop->index", $pendidikan->tingkat)) ? 'selected' : null }}>SMP</option>
                                    <option value="sma" {{ ('sma' == old("tingkat.$loop->index", $pendidikan->tingkat)) ? 'selected' : null }}>SMA</option>
                                    <option value="diploma" {{ ('diploma' == old("tingkat.$loop->index", $pendidikan->tingkat)) ? 'selected' : null }}>Diploma</option>
                                    <option value="sarjana" {{ ('sarjana' == old("tingkat.$loop->index", $pendidikan->tingkat)) ? 'selected' : null }}>Sarjana</option>
                                    <option value="master" {{ ('master' == old("tingkat.$loop->index", $pendidikan->tingkat)) ? 'selected' : null }}>Master</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="nama_tempat[]" class="form-control"
                                value="{{ old("nama_tempat.$loop->index", $pendidikan->nama_tempat) }}">
                            </td>
                            <td>
                                <input type="text" name="kota[]" class="form-control"
                                value="{{ old("kota.$loop->index", $pendidikan->kota) }}">
                            </td>
                            <td>
                                <input type="number" min="1900" max="2099" step="1" name="mulai[]" class="form-control"
                                value="{{ old("mulai.$loop->index", $pendidikan->mulai) }}">
                            </td>
                            <td>
                                <input type="number" min="1900" max="2099" step="1" name="selesai[]" class="form-control"
                                value="{{ old("selesai.$loop->index", $pendidikan->selesai) }}">
                            </td>
                            <td>
                                <input type="text" name="jurusan[]" class="form-control"
                                value="{{ old("jurusan.$loop->index", $pendidikan->jurusan) }}">
                            </td>
                            <td>
                                <input type="text" name="nilai[]" class="form-control"
                                value="{{ old("nilai.$loop->index", $pendidikan->nilai) }}">
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <tr id="tr_before">
                            <td colspan="7" class="text-center">
                                <button type="button" id="tambah_pendidikan" class="btn btn-success">Tambah Pendidikan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" form="form_edit_data" class="btn btn-primary float-end">Update</button>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#tambah_pendidikan').on('click', function () {
            $('#tabel_pendidikan > tbody > #tr_before').before(tr_table_update);
        });
    });

</script>
@endsection
