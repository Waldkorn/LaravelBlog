<form method="POST" action="/blog/{{ $user->id }}/blogEdit">
  {{ csrf_field() }}
  <div class="form-group">
    <div class="container">
      <div class="row">
        <label>Blog title</label>
        <input class="form-control" name="blogname" value="{{ $user->blog_name }}" placeholder="type a blogname..." required>
        <label>Header url</label>
        <input class="form-control" name="blogpicture" value="{{ $user->blog_header_picture }}" placeholder="type an url..." required>
        <input type="submit" class="btn btn-warning ml-auto" value="Edit Header" style="margin-top: 5px;">
      </div>
    </div>
  </div>
</form>