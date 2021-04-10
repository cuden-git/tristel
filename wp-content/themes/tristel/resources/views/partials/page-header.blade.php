<section>
  <div class="container">
    @if($page_headers['small'])
    <h1 class="page-title-small page-title-small--left">{{ $page_headers['small'] }}</h1>
    @endif
    @if($page_headers['large'])
    <h2 class="page-title page-title--left page-title--{{ $page_headers['width'] }}">{{ $page_headers['large'] }}</h2>
    @endif
    @if(is_search() || is_404())
      <h1 class="page-title page-title--left">{!! App::title() !!}</h1>
    @endif
  </div>
</section>
