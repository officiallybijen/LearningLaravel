<html>
    <head>
        <title>practice</title>
        <link rel="stylesheet" href="/app.css">
        <script src="/app.js"></script>
    </head>
    <body>
        @foreach($blogs as $blog)
          <p>{{$blog->title}}</p>  
          <a href="/blog/{{$blog->slug}}">Go to details</a>
          <p>{!! $blog->body !!}</p>
        @endforeach
    </body>
</html>