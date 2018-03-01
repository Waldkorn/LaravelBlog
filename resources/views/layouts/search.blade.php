<form method="POST" action="/posts/search">
  {{ csrf_field() }}
  <div class="form-group">
    <input class="form-control" name="search" placeholder="{{ __('messages.search') }}">
  </div>
</form>