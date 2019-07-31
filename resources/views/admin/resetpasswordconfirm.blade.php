@extends('admin.template')

@section('body')
<div class="heading m-5">
    <h1 class="text-center">New Password</h1>
</div>
<form action="/admin/resetpassword/final_action" method="post">
    @csrf
    <input type="hidden" name="password_token" value="{{$password_token}}">
    <input type="hidden" name="id" value="{{$id}}">
    <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password" aria-describedby="helpId">
        @error('password')<small id="helpId" class="text-muted">Your password is of insufficient length.</small>@enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" aria-describedby="helpId">
        @error('password_confirmation')<small id="helpId" class="text-muted">Your entered password doesn't match the password entered above</small>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
