@extends('admin.template')
@section('title', 'Manajemen Role')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="/manajemen-role/create" class="label label-success" style="padding: 6px">Tambah</a>

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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data as $key => $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->username}}</td>
                            <td>
                                @if(!empty($data->getRoleNames()))
                                @foreach($data->getRoleNames() as $v)
                                <label>{{ $v }}</label>
                                @endforeach
                                @endif</td>
                            <td>
                                <a href="/manajemen-role/{{ $data->id }}/edit"><button><i
                                        class="fa fa-fw fa-pencil-square-o"></i></button>
                                </a>
                                <form action="/manajemen-role/{{ $data->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button><i class="fa fa-fw fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {!! $data->links() !!} --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection