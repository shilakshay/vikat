@extends('admin.template')

@section('body')
    <p>You are logged in.</p>
    <a href="/admin/logout">Click here to logout.</a>
    @isset($alert)
        <p>{{$alert}}</p>
    @endisset
    <p>{{ Session::get('user') }}</p>
@endsection
