<section class="page-section product-carousel">
    <div class="container">
        <h2 class="product-carousel__slide-title section-title">{!! $product_slides['title'] !!}</h2>
        <h3 class="product-carousel__slide-hero-title page-title">{!! $product_slides['hero_title'] !!}</h3>
    </div>
    <div class="product-carousel__wrap container">
        <div class="glide" data-perview="3">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides product-carousel__slides">
                @foreach($product_slides['slides'] as $slide)
                    <li class="glide__slide product-carousel__slide">
                        <a href="{!! get_permalink($slide->ID) !!}" class="product-carousel__slide-inner" title="{{ $slide['name'] }}">
                            <div class="product-carousel__slide-img" style="background-image: url({!! $slide['url'] !!})"></div>
                            <h6>{!! $slide['name'] !!}</h6>
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
    <div class="container">
        @if($product_slides['btn'])
            <a href="{{ $product_slides['btn']['url'] }}" class="btn product-carousel__cta" title="{{ $product_slides['btn']['title'] }}">{{ $product_slides['btn']['title'] }}</a>
        @endif
    </div>
</section>
