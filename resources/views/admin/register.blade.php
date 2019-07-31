@extends('admin.template')

@section('body')
    <div class="container">
        <div class="form-home">
            <form action="/admin/action/add/admin" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name." aria-describedby="helpId">
                  @error('name')<small id="helpId" class="text-muted">Your input format is not correct</small>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email." aria-describedby="helpId">
                    @error('email')<small id="helpId" class="text-muted">Your input format is not correct</small>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password." aria-describedby="helpId">
                    @error('password')<small id="helpId" class="text-muted">Your input format is not correct</small>@enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your password." aria-describedby="helpId">
                    @error('password')<small id="helpId" class="text-muted">Your input format is not correct</small>@enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
