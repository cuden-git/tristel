<section class="page-section article-carousel">
  <div class="container">
    <h2 class="section-title">{!! $article_slides['title'] !!}</h2>
    <h3 class="page-title">{!! $article_slides['hero_title'] !!}</h3>
  </div>
  <div class="article-carousel__wrap container">
    <div class="glide" data-perview="3">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides article-carousel__slides">
            @foreach($article_slides['slides'] as $slide)
                <li class="glide__slide article-carousel__slide">
                  <div class="article-carousel__slide-inner">
                    <a href="{!! get_permalink($slide->ID) !!}" class="article-carousel__slide-img" title="{{ $slide->post_title }}" style="background-image: url({!! get_the_post_thumbnail_url($slide->ID) !!})"></a>
                    <div class="article-carousel__slide-text">
                      <span class="article-carousel__slide-date">{{ date('d F Y', strtotime($slide->post_date)) }}</span>
                      <h4 class="article-carousel__slide-title">{{ $slide->post_title }}</h4>
                      <a href="{!! get_permalink($slide->ID) !!}" title="{{ $slide->post_title }}">Read more</a>
                    </div>
                  </div>
                </li>
            @endforeach
            </ul>        
        </div>
      <div class="container article-carousel__controls glide__arrows" data-glide-el="controls">
          <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
          <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
      </div>
    </div>
  </div>
  <div class="container">
    @if($article_slides['btn'])
        <a href="{{ $article_slides['btn']['url'] }}" class="btn article-carousel__cta" title="{{ $article_slides['btn']['title'] }}">{{ $article_slides['btn']['title'] }}</a>
    @endif
  </div>
</section>
