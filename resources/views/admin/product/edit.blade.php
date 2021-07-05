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
    @include("partials.content_header", ['name'=>'product', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('products.update', ['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Gía sản phẩm</label>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file">
                            <div class="col-md-12 container_image_detail">
                                <div class="row">
                                    @foreach ($product->images as $imageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{$imageItem->image_path}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $optionSelect !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nhập tags cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach ($product->tags as $tagItem)
                                <option value="{{ $tagItem->name }}" selected>{{$tagItem->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nhập nội dung</label>
                            <textarea name="content" class="form-control tinymce_editor_init" id="" rows="15">{{ $product->content }}</textarea>
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
<script src="https://cdn.tiny.cloud/1/x3r4d3l3gyxtyq37ohwss7rzg4c4fvvm291gccrfxsm1tr6u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
