<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>

    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">Main</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contacts.index')}}">Contacts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about.index')}}">About</a>
                            </li>
                            @can('view', auth()->user())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.post.index')}}">Admin</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
