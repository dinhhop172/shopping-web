@extends('layouts.profile')
@section('profile')
<div class="col-md-9">
    <div class="font-28">Your pass</div>
    <p>Please enter your new email</p>
    <hr>
    <div class="col-md-9">
        <form action="{{ route('customer.changepass.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Current pass: </label><span> *****</span>
                <input type="password" name="password" class="form-control mb-2" placeholder="Input password" />
                <input type="password" name="re_password" class="form-control" placeholder="Re-password" />
            </div>
            <button type=" submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
