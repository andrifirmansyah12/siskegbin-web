@extends('admin.template')
@section('title', 'Data Anggota')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="/data-anggota/create" class="label label-success" style="padding: 6px">Tambah</a>

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
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Pangkat</th>
                            <th>WRP</th>
                            <th>Jabatan</th>
                            <th>Desa</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data as $key => $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->pangkat}}</td>
                            <td><span class="label label-success">{{$data->wrp}}</span></td>
                            <td>{{$data->jabatan}}</td>
                            <td>{{$data->desa}}</td>
                            <td>
                                <a href="/data-anggota/{{ $data->id }}/edit"><button><i
                                            class="fa fa-fw fa-pencil-square-o"></i></button>
                                </a>
                                <form action="/data-anggota/{{ $data->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button><i class="fa fa-fw fa-trash-o"></i></button>
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