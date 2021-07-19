@extends("layouts.admin")
@section("title", "Trang chủ")

@section("css")
@endsection

@section("js")
<script src="{{ asset('vendor/sweetAlert2/sweetalert2@11.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'role', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group float-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td scope="row">{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-default">Edit</a>
                                    {{-- <a href="{{ route('roles.destroy', ['id' => $role->id]) }}" data-url="{{ route('users.destroy', ['id' => $user->id]) }}" class="btn btn-danger action_delete">Delete</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $roles->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
