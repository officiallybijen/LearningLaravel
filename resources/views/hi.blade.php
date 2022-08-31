<html>
    <head>
        <title>practice</title>
        <link rel="stylesheet" href="/app.css">
        <script src="/app.js"></script>
    </head>
    <body>
        @foreach($blogs as $blog)
          <a href="/blog/{{$blog->id}}">{!! $blog->title !!}</a>
          <p>{!! $blog->body !!}</p>
        @endforeach
    </body>
</html>