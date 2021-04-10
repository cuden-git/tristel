<section class="page-section team-carousel">
  <div class="container">
    <h2 class="section-title">{!! $team_carousel['sub_title'] !!}</h2>
    <h3 class="page-title">{!! $team_carousel['hero_title'] !!}</h3>
  </div>
  <div class="container team-carousel__wrap">
    <div class="glide" data-perview="4">
      <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides team-carousel__slides">
          @foreach($team_carousel['slides'] as $slide)
              <li class="glide__slide team-carousel__slide">
                <div class="team-carousel__slide-inner">
                  <a href="{{ $slide['url'] }}" title="{{ $slide->post_title }}">
                  <div class="team-carousel__slide-img">
                    <div>
                      {!! get_the_post_thumbnail($slide['id']) !!}
                    </div>
                  </div>
                  <div class="team-carousel__slide-text">
                    <h4 class="team-carousel__slide-title">{{ $slide['title'] }}</h4>
                    <h6 class="team-carousel__slide-subtitle">{{ $slide['position'] }}</h6>
                  </div>
                  </a>
                </div>
              </li>
          @endforeach
          </ul>
      </div>
      <div class="container team-carousel__controls glide__arrows" data-glide-el="controls">
          <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
          <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
      </div>
    </div>
  </div>
  <div class="container">
    <a href="{{ $team_carousel['btn']['url'] }}" class="btn team-carousel__cta" title="{{ $team_carousel['btn']['title'] }}">{{ $team_carousel['btn']['title'] }}</a>
  </div>
</section>
