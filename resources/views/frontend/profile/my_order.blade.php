@extends('layouts.profile')
@section('profile')
<div class="col-md-9">

    <div class="font-28">My order</div>
    <p>Manage information to my order</p><hr>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">My order</div>
            <!-- Table -->
            <table class="table">
                @foreach ($data['order_details'] as $itemPro)
                <tr>
                    <td><img src="{{ $itemPro->product->feature_image_path }}" alt="" width="150px"></td>
                    <td>
                        <p>{{ $itemPro->product->name }}</p>
                        <p>x{{ $itemPro->quantity }}</p>
                    </td>
                    <td>Total: ${{ number_format($itemPro->total, 2) }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        {{ $data['order_details']->links() }}
</div>
@endsection
