@extends("layouts.admin")
@section("title", "Trang chủ")

@section("css")
<link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}">
@endsection
@section("js")
<script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'role', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" style="width: 100%">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                            <textarea name="display_name" class="form-control @error('display_name') is-invalid @enderror" cols="30" rows="4">{{old('description')}}</textarea>
                            @error('display_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($permissionParent as $permissionParentItem)
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" value="" class="checkbox_wrapper">
                                    </label>
                                    Module {{ $permissionParentItem->name }}
                                </div>
                                <div class="row">
                                    @foreach ($permissionParentItem->permissionsChildrent as $permissionsChildrentItem)
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <label>
                                                <input type="checkbox" name="permission_id[]" class="checkbox_children" value="{{ $permissionsChildrentItem->id }}">
                                            </label>
                                            {{ $permissionsChildrentItem->name }}
                                        </h5>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
