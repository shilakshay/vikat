@extends('admin.template')

@section('body')
    <div class="form-home">
        <div class="heading">
            <h1 class="text-center">Add a new product</h1>
        </div>
        <form action="/admin/action/product/create" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Product Name" aria-describedby="helpId">
              @error('name')<small id="helpId" class="text-muted">The name you have entered is invalid.</small>@enderror
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea name="desc" id="" cols="30" rows="10" class="form-control" style="white-space: pre-wrap;"></textarea>
              @error('desc')<small id="helpId" class="text-muted">Your input is invalid.</small>@enderror
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" step="0.01" class="form-control" placeholder="Enter price" aria-describedby="helpId">
              @error('price')<small id="helpId" class="text-muted">Your input is invalid.</small>@enderror
            </div>
            <div class="form-group">
              <label for="type">Type</label>
              <input type="text" name="type" id="type" class="form-control" placeholder="Type of product" aria-describedby="helpId">
              @error('type')<small id="helpId" class="text-muted">Your input is invalid</small>@enderror
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
