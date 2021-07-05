@extends("layouts.admin")
@section("title", "Trang chủ")

@section("css")
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'menu', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('sliders.update', ['id'=>$slider->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" name="name" value="{{ $slider->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả slider</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="4">{{ $slider->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror">
                            <div class="col-md-4">
                                <div class="row">
                                    <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                                </div>
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
