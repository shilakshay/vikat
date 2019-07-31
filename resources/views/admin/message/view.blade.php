@extends('admin.template')

@section('body')

<div>
        <div class="heading m-4">
            <h1 class="text-center">Messages</h1>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($message as $item)
                        <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->message}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-links">
            <nav aria-label="Page navigation">
            <ul class="pagination">
                {{$message->links()}}
            </ul>
            </nav>
        </div>
    </div>

@endsection
