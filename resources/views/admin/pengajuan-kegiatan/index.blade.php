@extends('admin.template')
@section('title', 'Pengajuan Kegiatan')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Nama Anggota</option>
                                    <option>Nama</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Pilih Bulan</option>
                                    <option>Bulan</option>
                                </select>
                            </div>
                        </div><br>
                    </div>
                    <div>
                        <a href="{{ route('pengajuan-kegiatans.create') }}" class="label label-primary"
                            style="padding: 6px">Tambah</a>
                        <a href="#" class="label label-success"
                            style="padding: 6px">Print</a>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Kegiatan</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data as $key => $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$data->anggota->user->name}}</td>
                            <td>{{date("d F Y", strtotime($data->tanggal))}}</td>
                            <td>{{$data->kegiatan}}</td>
                            <td>{{$data->deskripsi}}</td>
                            <td><img src="/public/pengajuan-kegiatan/{{ $data->foto }}" width="100px"></td>
                            <td>{{$data->alamat}}</td>
                            <td>
                                <a href="{{ route('pengajuan-kegiatans.show', $data->id) }}"><button><i
                                            class="fa fa-fw fa-eye"></i></button>
                                </a>
                                <a href="{{ route('pengajuan-kegiatans.edit', $data->id) }}"><button><i
                                            class="fa fa-fw fa-pencil-square-o"></i></button>
                                </a>
                                <form action="{{ route('pengajuan-kegiatans.destroy', $data->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"><i class="fa fa-fw fa-trash-o"></i></button>
                                </form>
                                <form action="#" method="post">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Konfirmasi</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
