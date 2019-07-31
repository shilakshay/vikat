@extends('admin.template')

@section('body')

<div class="form-home">
    <div class="heading">
        <h1 class="text-center">Login Form</h1>
    </div>
    <form action="/admin/action/login" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" aria-describedby="helpId">
          @error('email')<small id="helpId" class="text-muted">There is some problem with the email you've entered.</small>@enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" aria-describedby="password">
          @error('password')<small id="password" class="text-muted">Your password is incorrect.</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
