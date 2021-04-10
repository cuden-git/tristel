<section class="grid-panels">
  <div class="container">
    <div class="row">
      @foreach($grid_panels as $panel)
        <div class="col-12 col-md-4 grid-panels__cell">
          <a href="{!! $panel['link']['url'] !!}" title="{{ $panel['link']['title'] }}">
            <div class="grid-panels__cell-img">
              <div>
                {!! wp_get_attachment_image( $panel['image']['ID'], 'full' ) !!}
              </div>
            </div>
            <h6 class="grid-panels__cell-title">{{ $panel['link']['title'] }}</h6>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
