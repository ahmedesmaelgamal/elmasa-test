<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <nav>
        <a href="/home">home</a>
        <a href="/users">users</a>
        <a href="/posts">posts</a>
    </nav>
    @yield('body')
    @section('section')
        <h2>our website is awesome</h2>
    @show
</body>
</html>