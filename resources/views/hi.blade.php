<html>
    <head>
        <title>practice</title>
        <link rel="stylesheet" href="/app.css">
        <script src="/app.js"></script>
    </head>
    <body>
        @foreach($blogs as $blog)
          <a href="/blog/{{$blog->slug}}">{!! $blog->title !!}</a>
          <p>By: <a href="/author/{{$blog->author->id}}">{{$blog->author->name}}</a> </p>
          <p>category:<a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
          <p>{!! $blog->body !!}</p>
        @endforeach
    </body>
</html>