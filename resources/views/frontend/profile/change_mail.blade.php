@extends('layouts.profile')
@section('profile')
<div class="col-md-9">
    <div class="font-28">Your mail</div>
    <p>Please enter your new email</p>
    <hr>
    <div class="col-md-9">
        <form action="{{ route('customer.changemail.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Current email: </label><span> {{ $user->email }}</span>
                <input type="text" name="email" class="form-control" placeholder="Input email" value="{{ old('email') }}" />
            </div>
            <button type=" submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
