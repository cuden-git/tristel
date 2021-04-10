<section class="glide hero-carousel">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides hero-carousel__slides">
        @foreach($hero_slides as $slide)
            <li class="glide__slide hero-carousel__slide">
                <div class="hero-carousel__slide-img">
                    <picture>
                        <source media="(max-width:767px)" srcset="{{ $slide['slide_mobile_img']['url'] }}">
                        <source media="(min-width:768px)" srcset="{{ $slide['slide_img']['url'] }}">
                        <img src="{{ $slide['slide_img']['url'] }}" alt="{{ $slide['slide_img']['alt'] }}">
                    </picture>
                </div>
                <div class="container hero-carousel__slide-inner">
                    <h2 class="hero-carousel__slide-title">{!! $slide['title'] !!}</h2>
                    <p class="hero-carousel__slide-text">{{ $slide['text'] }}</p>
                    @if($slide['cta_btns'])
                    <div class="hero-carousel__btns">
                        @foreach($slide['cta_btns'] as $btn)
                            <a 
                            href="{{ $btn['link']['url'] }}" 
                            class="btn{{ ($btn['btn_type'] == 'keyline')? ' btn--kl' : null }}"
                            {!! ($btn['btn_type'] == 'custom')? ' style="background-color: '.$btn['btn_colours']['bg_colour'].'; color: '.$btn['btn_colours']['label_colour'].'"' : null !!} 
                            title="{{ $btn['link']['title'] }}">
                            {{ $btn['link']['title'] }}</a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    <div class="container hero-carousel__controls glide__arrows" data-glide-el="controls">
        <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
        <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
    </div>
</section>
