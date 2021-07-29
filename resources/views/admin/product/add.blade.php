@extends("layouts.admin")
@section("title", "Add product")

@section("css")
<link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'product', 'key'=>'Add'])
    <!-- /.content-header -->
    <div class="col-md-12">
    </div>
    <!-- Main content -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gía sản phẩm</label>
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $optionSelect !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nhập tags cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach ($tags as $tagItem)
                                <option value="{{ $tagItem->id }}">{{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nhập nội dung</label>
                            <textarea name="content" class="form-control tinymce_editor_init @error('content') is-invalid @enderror" id="" rows="15">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </form>
</div>
<!-- /.content-wrapper -->
@endsection


@section("js")
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
