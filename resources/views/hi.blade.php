<html>
    <head>
        <title>practice</title>
        <link rel="stylesheet" href="/app.css">
        <script src="/app.js"></script>
    </head>
    <body>
        @foreach($blogs as $blog)
          <a href="/blog/{{$blog->slug}}">{!! $blog->title !!}</a>
          <p>category:{{$blog->category->cat_name}}</p>
          <p>{!! $blog->body !!}</p>
        @endforeach
    </body>
</html>