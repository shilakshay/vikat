@extends('admin.template')

@section('body')

<div class="form-home">
    <div class="heading">
        <h1 class="text-center">Photo Uploads</h1>
        <p class="text-center"><span class="font-weight-bold">Product Name </span>{{$product_name}}</p>
    </div>
    <form class="m-5" action="/admin/dashboard/productimage/save" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="form-group">
          <label class="custom-file">
            <input type="file" name="product[]" placeholder="Enter the images here" class="custom-file-input" aria-describedby="fileHelpId" multiple>
            <span class="custom-file-control"></span>
          </label>
          @error('product')<small id="fileHelpId" class="form-text text-muted">Your file format is invalid.</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
