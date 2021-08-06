@extends('layouts.home')
@section('title', 'Profile')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/app.css') }}">
@endsection
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex justify">
                    <a href="#" class="font-35 pr-4">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <div class="click-user">
                        <p>Keira</p>
                        <p>Gues</p>
                    </div>
                </div>
                <hr>
                <div class="group">
                    <a class="btn btn-large btn-block btn-default" href="{{ route('customer.profile')}}" role="button">My account</a>
                    <a class="btn btn-large btn-block btn-default" href="{{ route('customer.order')}}" role="button">My Order</a>
                </div>
            </div>
            @yield('profile')
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $('#verifyPasswordMail').on('submit', function(e) {
        e.preventDefault();
        $dataRoute = $('#verifyPasswordMail').data('route');
        $form_data = $(this);
        console.log($form_data.serialize());
        $data_pass = $('#verifyPass').val();
        $.ajax({
            url: $dataRoute,
            type: 'GET',
            data: $form_data.serialize(),
            success: function(result) {
                if (result.success) {
                    location.href = "{{ route('customer.changemail') }}";
                } else {
                    swal({
                        closeOnClickOutside: false,
                        icon: "warning",
                        title: 'Wrong password, please check again!',
                        showSpinner: true
                    });
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    });

    $('#verifyPasswordPhone').on('submit', function(e) {
        e.preventDefault();
        $dataRoute = $('#verifyPasswordPhone').data('route');
        $form_data = $(this);
        $.ajax({
            url: $dataRoute,
            type: 'GET',
            data: $form_data.serialize(),
            success: function(result) {
                if (result.success) {
                    location.href = "{{ route('customer.changephone') }}";
                } else {
                    swal({
                        closeOnClickOutside: false,
                        icon: "warning",
                        title: 'Wrong password, please check again!',
                        showSpinner: true
                    });
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    });

    $('#verifyPassword').on('submit', function(e) {
        e.preventDefault();
        $dataRoute = $('#verifyPassword').data('route');
        $form_data = $(this);
        $.ajax({
            url: $dataRoute,
            type: 'GET',
            data: $form_data.serialize(),
            success: function(result) {
                if (result.success) {
                    location.href = "{{ route('customer.changepass') }}";
                } else {
                    swal({
                        closeOnClickOutside: false,
                        icon: "warning",
                        title: 'Wrong password, please check again!',
                        showSpinner: true
                    });
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    });
</script>
@endsection
