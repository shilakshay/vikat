@extends('admin.template')

@section('body')
<div class="heading">
    <h1 class="text-center">Reset Password</h1>
</div>
<div class="form-home">
    <form action="/admin/resetpassword/action" method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter the email" aria-describedby="helpId">
          @error('email')<small id="helpId" class="text-muted">The format of email address is incorrect.</small>@enderror
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
