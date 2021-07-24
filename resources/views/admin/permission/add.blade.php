@extends("layouts.admin")
@section("title", "Trang chủ")
@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'Permission', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Chọn tên module</label>
                            <select class="form-control" name="module_parent">
                                <option value="0">Chọn tên module</option>
                                @foreach (config('permissions.table_module') as $moduleItem)
                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                @foreach (config('permissions.module_children') as $moduleItem)
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="{{$moduleItem}}" name="module_children[]">
                                            {{ $moduleItem }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
