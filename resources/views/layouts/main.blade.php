<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href="{{route('main.index')}}">Main</a></li>
                <li><a href="{{route('post.index')}}">Posts</a></li>
                <li><a href="{{route('contacts.index')}}">Contacts</a></li>
                <li><a href="{{route('about.index')}}">About</a></li>
            </ul>
        </nav>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
