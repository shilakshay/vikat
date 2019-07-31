@extends('client.template')

@section('body')

<style>
        .text-center{
            text-align: center;
        }
        .message-success{
            margin: 2em 0;
            width: 100%;
            min-height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="message-success">
        <p class="text-center">{{$message}}</p>
    </div>
@endsection
