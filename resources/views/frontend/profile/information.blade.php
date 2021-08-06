@extends('layouts.profile')
@section('profile')
<div class="col-md-9">
    <div class="font-28">My account</div>
    <p>Manage profile information to account security</p>
    <hr>
    <div class="col-md-9">
        <form action="{{ route('customer.profilesubmit') }}" method="POST">
            @csrf
            <div class="form-group wid-20">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Input name" value="{{ $user->name }}">
            </div>
            <div class="form-group wid-20">
                <label for="">Email: </label><span> {{ $user->email }}</span>
                <a href="#" data-toggle="modal" data-target="#changeMail">Change</a>
            </div>
            <div class="form-group wid-20">
                <label for="">Phone: </label><span> {{ $user->phone }}</span>
                <a href="#" data-toggle="modal" data-target="#changePhone">Change</a>
            </div>
            <div class="form-group wid-20">
                <label for="">Password: <span> ***</span></label>
                <a href="#" data-toggle="modal" data-target="#changePass">Change</a>
            </div>
            <div class="form-group wid-20">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Input address" value="{{ $user->address }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- Modal email -->
<div id="changeMail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change email</h4>
            </div>
            <div class="modal-body pt-4">
                <p>To update new email, please confirm by entering password</p>
                <form id="verifyPasswordMail" method="GET" data-route="{{ route('customer.verifypassword') }}">
                    <div class="form-group">
                        <input type="password" id="verifyPass" name="password" class="form-control" required="required" placeholder="Password...">
                    </div>
                    <button type="submit" class="btn btn-large btn-block btn-info mt-3">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal phone -->
<div id="changePhone" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change phone</h4>
            </div>
            <div class="modal-body pt-4">
                <p>To update new phone, please confirm by entering password</p>
                <form id="verifyPasswordPhone" method="GET" data-route="{{ route('customer.verifypassword') }}">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" required="required" placeholder="Password...">
                    </div>
                    <button type="submit" class="btn btn-large btn-block btn-info mt-3">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal pass -->
<div id="changePass" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change password</h4>
            </div>
            <div class="modal-body pt-4">
                <p>To update new password, please confirm by entering password</p>
                <form id="verifyPassword" method="GET" data-route="{{ route('customer.verifypassword') }}">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" required="required" placeholder="Password...">
                    </div>
                    <button type="submit" class="btn btn-large btn-block btn-info mt-3">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
