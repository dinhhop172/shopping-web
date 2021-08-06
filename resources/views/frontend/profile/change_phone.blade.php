@extends('layouts.profile')
@section('profile')
<div class="col-md-9">
    <div class="font-28">Your phone</div>
    <p>Please enter your new phone</p>
    <hr>
    <div class="col-md-9">
        <form action="{{ route('customer.changephone.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Current phone: </label><span> {{ $user->phone }}</span>
                <input type="number" name="phone" class="form-control" placeholder="Input phone" value="{{ old('phone') }}">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
