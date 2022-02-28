@extends('admin.template')
@section('title', 'Tambah Manajemen Role')

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
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Minimal</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Disabled Result</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option disabled="disabled">California (disabled)</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection