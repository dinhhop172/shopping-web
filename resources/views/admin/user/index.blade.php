@extends("layouts.admin")
@section("title", "Trang chủ")

@section("css")
@endsection

@section("js")
@endsection

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include("partials.content_header", ['name'=>'user', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group float-right">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <th scope="row">{{ $user->name }}</th>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-default">Edit</a>
                                    {{-- <a href="" data-url="{{ route('users.destroy', ['id' => $user->id]) }}" class="btn btn-danger action_delete">Delete</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
