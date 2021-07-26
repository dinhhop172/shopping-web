@extends("layouts.admin")
@section("title", "Trang chủ")
@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'permission', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nhập tên module</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên module">
                        </div>
                        <div class="form-group">
                            <label>Tên hiển thị</label>
                            <input type="text" name="display_name" class="form-control" placeholder="Nhập tên module cha + tên module, vd: category_list">
                        </div>
                        <div class="form-group">
                            <label>Chọn module cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn module cha</option>
                                {!! $optionPermission !!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
