@extends("admin.template")

@section("body")

<div class="heading m-5">
    <h1 class="text-center">Product Images</h1>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
        <tr>
            <td scope="row">{{($loop->index)+1}}</td>
            <td>{{ $item->product->name }}</td>
            <td>
                <img src="{{$item->url}}" class ="product-table-image" alt="">
            </td>
            <td>
                <a href="/admin/action/photoimage/delete/{{$item->id}}" class="btn btn-warning">Delete</a><a href="#"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{$collection->render()}}
</div>

@endsection
