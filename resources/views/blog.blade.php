<html>
    <head><title>single blog</title></head>
    <body>
        <h1>{{$blog->title}}</h1>
        <p>{!! $blog->body !!}</p>
        <a href="/hi">Go back</a>
    </body>
</html>