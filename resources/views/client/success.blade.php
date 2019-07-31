@extends('client.template')

@section('body')
<style>
    .text-center{
        text-align: center;
    }
    .message-success{
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>

<div class="message-success">
    <p class="text-center">{{$message}}</p>
</div>

@endsection
