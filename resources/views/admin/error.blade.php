@extends('admin.template')

@section('body')
    <p>{{ $message }}</p>


    @if(Session::has('user'))
    <a href="/admin/dashboard">Go to home.</a>
    @else
    <a href="/admin/home">Go to home.</a>
    @endif
@endsection
