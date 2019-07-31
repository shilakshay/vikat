<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vikat Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/vikat.css">
</head>
<body>

    <nav>
        <div class="company-name">
            <p>Vikat Dhoop</p>
        </div>
        <div class="btn-group">
            <p class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(session()->has('user'))
            {{Session::get('user')}}
            @else
            Menu
            @endif
            </p>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                @if(session()->has('user'))<a class="dropdown-item" href="/admin/logout">Logout</a>
                @else <a class="dropdown-item" href="/admin/login">Log In </a>@endif
                {{-- <a class="dropdown-item disabled" href="#">Disabled action</a>
                <h6 class="dropdown-header">Section header</h6>
                <a class="dropdown-item" href="#">Action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">After divider action</a> --}}
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-sm-3 sidebar-color">
            {{-- Include the sidebar if and only if the admin is logged in --}}
            @if(!session()->has('user'))
                @include('admin.guestsidebar')
            @else
                @include('admin.sidebar')
            @endif
        </div>
        <div class="col-sm-9">
            @yield('body')
        </div>
    </div>
</body>
</html>
