@include('modules.newsletter-signup')
<footer class="site-footer">
  <div class="site-footer__top">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-3">
          <a class="site-footer__brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}"><img src="@asset('images/tristel-logo.svg')" alt="{{ get_bloginfo('name', 'display') }}"></a>
          @include('components.social')
        </div>
        <div class="site-footer__links col-12 col-md-9">
        @foreach($footer_links as $col)
          <div>
          <h6>{{ $col['links_column_title'] }}</h6>
            <ul>
            @foreach($col['links_column'] as $link)
              <li><a href="{{ $link['link']['url'] }}" title="{{ $link['link']['title'] }}">{{ $link['link']['title'] }}</a></li>
            @endforeach
            </ul>
          </div>
        @endforeach
        </div>
      </div>
      <div class="row">
        <div class="col-12 site-footer__logos">
        @foreach($footer_logos as $logo)
          @if($logo['img_link'])
            <a href="{{ $logo['img_link']['url'] }}" title="{{ $logo['img_link']['title'] }}">{{ $logo['img_link']['title'] }}
          @endif
            <img src="{{ $logo['img']['url'] }}" alt="{{ $logo['img']['alt'] }}">
          @if($logo['img_link'])
            </a>
          @endif
        @endforeach
        </div>
        <span class="site-footer__to-top" data-back-to-top>{!! __('Back to Top', 'tristel') !!}</span>
      </div>
    </div>
  </div>
  <div class="site-footer__bottom">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'site-footer__items', 'container' => false]) !!}
        </div>
        <div class="col-12 col-md-6">
          <ul>
          @foreach ( $footer_credits as $credit )
             <li>{{ $credit['credit'] }}</li> 
          @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
@include('components.gdpr-alert')
@include('partials.content-signup-modal')
