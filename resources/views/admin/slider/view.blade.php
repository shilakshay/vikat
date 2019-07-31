@extends('admin.template')

@section('body')
<div class="heading">
    <h1 class="text-muted text-center">Slider View</h1>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Slider Image</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($slider as $item)
        <tr>
            <td scope="row">{{$loop->index}}</td>
            <td>{{$item->product->name}}</td>
            <td><img src="{{$item->public_path}}" alt="" class="product-table-image"></td>
            <td>
                <div class="d-flex justify-content-center">
                    <a href="/admin/action/slider/delete/{{$item->product_id}}" class="btn btn-info">Delete</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
