@extends('admin.template')

@section('body')
<div class="heading">
    <h1 class="text-center">Create a new Slider</h1>
</div>
<form action="/admin/dashboard/slider/store" method="POST" enctype="multipart/form-data" class="mt-5">
    @csrf
    <div class="form-home d-flex justify-content-center flex-column align-items-center">
        <div class="form-group m-3">
            <label class="custom-file">
            <input type="file" name="slider" id="slider" placeholder="Enter the slider image" class="custom-file-input" aria-describedby="fileHelpId">
            <span class="custom-file-control"></span>
            </label>
            @error('photo')<small id="fileHelpId" class="form-text text-muted">Your photo is invalid.</small>@enderror
        </div>
        <div class="form-group m-3">
            <label for="product_name">Product</label>
            <select class="custom-select d-block" name="product_name" id="product_name">
                @foreach ($product as $item)
                <option value="{{$item->id}}" @if($loop->index+1 == 1)selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-info m-5">Submit</button>
    </div>
</form>
@endsection
