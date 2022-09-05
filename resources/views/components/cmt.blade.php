@props(['comment'])
<div class="col-span-8 col-start-5 mt-10" style="display: flex;width=100%">
    <img  src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png"
     alt="default pp" width="60px">
    <div style="margin-left: 40px;">
        <h6>{{ $comment->author->username }}</h6>
        <p>{{ $comment->created_at->diffForHumans() }}</p>
        <p>{{ $comment->body }}</p>
    </div>
</div>
  