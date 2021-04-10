<section class="page-section product-carousel page-section--{{ $standard_carousel['section_bg'] }}">
    <div class="container">
        <h2 class="product-carousel__slide-title section-title">{!! $standard_carousel['title'] !!}</h2>
        <h3 class="product-carousel__slide-hero-title page-title">{!! $standard_carousel['hero_title'] !!}</h3>
    </div>
    <div class="container">
        <div class="product-carousel__wrap">
            <div class="glide" data-perview="3">        
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides product-carousel__slides">
                    @foreach($standard_carousel['slides'] as $slide)
                        <li class="glide__slide product-carousel__slide">
                            <a href="{!! $slide['slide_link']['url'] !!}" class="product-carousel__slide-inner" title="{{ $slide['slide_link']['title'] }}" target="{{ $slide['slide_link']['target'] }}">
                                <div class="product-carousel__slide-img" style="background-image: url({!! $slide['image']['url'] !!})"></div>
                                <h6>{!! $slide['slide_link']['title']!!}</h6>
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="container product-carousel__controls glide__arrows" data-glide-el="controls">
                    <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
                    <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>
