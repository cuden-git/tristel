<section class="page-section text-img-blocks">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 text-img-blocks__text">
        @if($img_text_blocks['title'])
        <h2 class="section-title section-title--left">{{ $img_text_blocks['title'] }}</h2>
        @endif
        @if($img_text_blocks['hero_title'])
        <h3 class="page-title page-title--left">{{ $img_text_blocks['hero_title'] }}</h3>
        @endif
          @if($img_text_blocks['text'])
          <div class="text-img-blocks__copy">
          {{ $img_text_blocks['text'] }}
          </div>
          @endif
          @if($img_text_blocks['btn'])
          <a href="{{ $img_text_blocks['btn']['url'] }}" class="btn text-img-blocks__cta" title="{{ $img_text_blocks['btn']['title'] }}">{{ $img_text_blocks['btn']['title'] }}</a>
          @endif
      </div>
      <div class="col-12 col-md-6 text-img-blocks__img">
        {!! wp_get_attachment_image( $img_text_blocks['img'], 'full' ) !!}
      </div>
    </div>
  </div>
</section>
