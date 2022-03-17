@extends('admin.template')
@section('title', 'Tambah Anggota')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Input</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                        class="fa fa-remove"></i></button> --}}
            </div>
        </div>
        <!-- /.box-header -->
        <form class="w-full p-10" action="/data-anggota" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" required autofocus value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" required value="{{ old('jabatan') }}"
                                class="form-control @error('jabatan') is-invalid @enderror" placeholder="Jabatan">
                            @error('jabatan')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Pangkat</label>
                            <input type="text" name="pangkat" required value="{{ old('pangkat') }}"
                                class="form-control @error('pangkat') is-invalid @enderror" placeholder="Pangkat">
                            @error('pangkat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Desa</label>
                            <input type="text" name="desa" required value="{{ old('desa') }}"
                                class="form-control @error('desa') is-invalid @enderror"
                                placeholder="Desa">
                            @error('desa')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>WRP</label>
                            <input type="number" name="wrp" value="{{ old('wrp') }}" class="form-control @error('wrp') is-invalid @enderror"
                                placeholder="WRP">
                            @error('wrp')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right" style="margin-left: 10px">Tambah</button>
                    <a href="/data-anggota" class="btn btn-default pull-right">Batal</a>

                </div>
            </div>
        </form>
    </div>
</section>
@endsection