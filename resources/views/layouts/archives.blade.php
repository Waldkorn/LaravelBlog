<div>
  <h4 class="font-italic">Archives</h4>   
  @foreach($archives as $year => $months)
    <h6 class="mb-0">
      <a href="/{{$year}}/posts">
        {{ $year }}
      </a><br>
    </h6>
  @endforeach
</div>