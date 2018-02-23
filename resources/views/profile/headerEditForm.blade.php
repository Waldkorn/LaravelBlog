<form method="POST" action="/posts/blog/{{ $user->id }}/blogEdit">
  {{ csrf_field() }}
  <div class="form-group">
    <div class="container">
      <div class="row">
        <input class="form-control" name="blogpicture" value="{{ $user->blog_header_picture }}" placeholder="type an url..." required>
        <input class="form-control" name="blogname" value="{{ $user->blog_name }}" placeholder="type a blogname..." required>
        <input type="submit" class="btn btn-warning ml-auto" value="Edit Blog">
      </div>
    </div>
  </div>
</form>