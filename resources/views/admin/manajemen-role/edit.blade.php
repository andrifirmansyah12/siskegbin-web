@extends('admin.template')
@section('title', 'Edit Manajemen Role')

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
        <form class="w-full p-10" action="/manajemen-role/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" required autofocus value="{{ old('name', $user->name) }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" required value="{{ old('password', $user->password)}}"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" required value="{{ old('username', $user->username)}}"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                            @error('username')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="text" name="confirm-password" required value="{{ old('confirm-password', $user->password)}}"
                                class="form-control @error('confirm-password') is-invalid @enderror"
                                placeholder="Konfirmasi Password">
                            @error('confirm-password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required value="{{ old('email', $user->email)}}" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email">
                            @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Role</label>
                            <select name="roles" required
                                class="form-control select2 @error('roles') is-invalid @enderror" style="width: 100%;">
                                @foreach ($roles as $key => $roles)
                                @if ( old('roles_id', $roles->id) == $roles->id )
                                <option value="{{ $roles->id }}" selected>{{ $roles->name }}</option>
                                @else
                                <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('roles')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right" style="margin-left: 10px">Tambah</button>
                    <a href="/manajemen-role" class="btn btn-default pull-right">Batal</a>

                </div>
            </div>
        </form>
    </div>
</section>
@endsection