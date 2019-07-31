@extends('admin.template')

@section('body')
<div>
    <div class="heading m-4">
        <h1 class="text-center">Products</h1>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->desc}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->type}}</td>
                        <td>
                            <div>
                                <a href="/admin/action/product/edit/{{$item->id}}" class="btn btn-primary">Edit</a>
                                <a href="/admin/action/product/delete/{{$item->id}}" class="btn btn-warning">Delete</a>
                                <a href="/admin/dashboard/productimage/upload/{{$item->id}}" class="btn btn-info">Upload Photos</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-links">
        <nav aria-label="Page navigation">
        <ul class="pagination">
            {{$product->links()}}
        </ul>
        </nav>
    </div>
</div>
@endsection
