<div class="social">
  <h6>Follow</h6>
  <ul>
    @foreach ($social_links as $link)
    <li><a href="{{ $link['url'] }}" title="{{ $link['type']['label'] }}"><i class="{{ $link['type']['value'] }}"></i></li>
    @endforeach
  </ul>
</div>
