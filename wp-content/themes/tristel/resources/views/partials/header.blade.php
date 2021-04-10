<header class="site-header site-header--top">
    <div class="container">
      <nav class="secondary-nav">
        @if (has_nav_menu('secondary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'secondary-nav__items', 'container' => false]) !!}
        @endif
      </nav>
      @include('partials.select-country-lang')
    </div>
</header>
<header class="site-header site-header--bottom">
  <div class="container">
    <a class="site-header__logo" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}"><img src="@asset('images/tristel-logo.svg')" alt="{{ get_bloginfo('name', 'display') }}"></a>
    <nav class="main-nav">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'main-nav__items', 'container' => false, 'walker' => new Walker_Sub_Menu()]) !!}
      @endif
    </nav>
    <div class="site-header__btns">
    @if (country_permitted())
      <a href="{{ get_permalink( get_option('woocommerce_myaccount_page_id') ) }}" title="_e('My Account')"><i class="fas fa-user"></i></a>
      <a href="{!! wc_get_cart_url() !!}" class="site-header__basket" title="{{ _e('Shopping cart') }}"><i class="fas fa-shopping-cart"></i><span class="site-header__basket-count">{{ $wc_global->cart->get_cart_contents_count() }}</span></a>
    @endif
      <i class="site-header__search fas fa-search" data-modal-target="#search-modal"></i>
      <a href="tel:" class="site-header__phone" title="{{ _e('Call now') }}"><i class="fas fa-phone-alt"></i></a>
      {{-- <i class="site-header__nav-btn fas fa-bars"></i> --}}
      {{-- <i class="site-header__nav-btn site-header__nav-btn--close fas fa-bars"></i> --}}
      <span class="site-header__nav-btn nav-btn">
        <span></span>
        <span></span>
        <span></span>
      </span>
      <a href="{!! get_permalink( get_page_by_path( 'contact' ) ) !!}" class="btn" title="Contact">{{ __('CONTACT', 'tristel') }}</a>
    </div>
  </div>
</header>
@include('partials.content-search-modal')
@include('components.breadcrumbs')
