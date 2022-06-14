@extends('admin.template')
@section('title', 'Detail Pengajuan Kegiatan')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Pengajuan Kegiatan</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                        class="fa fa-remove"></i></button> --}}
            </div>
        </div>
        <!-- /.box-header -->
        <form class="w-full p-10" action="{{ route('pengajuan-kegiatans.update', $pengajuanKegiatan->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <input disabled type="text" name="tanggal" value="{{ $pengajuanKegiatan->anggota->user->name }}" class="form-control datepicker border px-3 @error('tanggal') is-invalid @enderror"
                                    placeholder="Tanggal Kegiatan">
                            @error('anggota_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input disabled type="text" name="tanggal" value="{{ date("d-F-Y", strtotime($pengajuanKegiatan->tanggal)) }}" class="form-control datepicker border px-3 @error('tanggal') is-invalid @enderror"
                                    placeholder="Tanggal Kegiatan">
                            @error('tanggal')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kegiatan</label>
                            <input disabled type="text" name="kegiatan" required autofocus value="{{ $pengajuanKegiatan->kegiatan }}"
                                class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Kegiatan">
                            @error('kegiatan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Kegiatan</label>
                            <textarea disabled class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required rows="3" placeholder="Deskripsi Kegiatan">{{$pengajuanKegiatan->deskripsi}}</textarea>
                            @error('deskripsi')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p style="font-weight: bold">Foto</p>
                            <div>
                                <img src="/public/pengajuan-kegiatan/{{ $pengajuanKegiatan->foto }}" width="100px">
                            </div>
                            @error('foto')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input disabled type="text" name="provinsi" required value="{{ $pengajuanKegiatan->provinsi }}"
                                class="form-control @error('provinsi') is-invalid @enderror" placeholder="Provinsi">
                            @error('provinsi')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kabupaten/Kota</label>
                            <input disabled type="text" name="kabupaten" required value="{{ $pengajuanKegiatan->kabupaten }}"
                                class="form-control @error('kabupaten') is-invalid @enderror" placeholder="Kabupaten/Kota">
                            @error('kabupaten')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input disabled type="text" name="kecamatan" required value="{{ $pengajuanKegiatan->kecamatan }}"
                                class="form-control @error('kecamatan') is-invalid @enderror" placeholder="Kecamatan">
                            @error('kecamatan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Desa</label>
                            <input disabled type="text" name="kelurahan" required value="{{ $pengajuanKegiatan->kelurahan }}"
                                class="form-control @error('kelurahan') is-invalid @enderror" placeholder="Desa">
                            @error('kelurahan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea disabled class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Alamat">{{ $pengajuanKegiatan->alamat }}</textarea>
                            @error('alamat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-success" style="padding: 20px 60px 20px 60px; margin: 24px 0 0 0">Set Lokasi</a>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="/pengajuan-kegiatans" class="btn btn-default pull-right">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
