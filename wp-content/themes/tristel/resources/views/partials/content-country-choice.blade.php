@if(!isset($_COOKIE["countryPath"]) && count($geo_site['sites']) > 1)
  @component('components.modal',['classes' => ['modal--active', 'country-choice'], 'hide_close' => true])
    <div class="country-choice__intro">
      <h2 class="country-choice__intro-title">{{ $geo_site['intro']['title'] }}</h2>
      <div class="country-choice__intro-text">
        {!! $geo_site['intro']['intro'] !!}
      </div>
    </div>
    <ul class="country-choice__list" data-country-choice>
        <li style="background-image: url({{ $geo_site['flag']['url'] }})">
          {{ $geo_site['country'] }}
          <ul class="country-choice__list-lang">
          @foreach ($geo_site['sites'] as $language)
            <li><a href="{{ $language['url'] }}" data-country-code="{{ $geo_site['country_code'] }}" data-country-path="{{ $language['url'] }}" data-country-blog-id="{{ $language['blog_id'] }}">{{ $language['lang']['label'] }}</a></li>
          @endforeach
          </ul>
        </li>
    </ul>
  @endcomponent
@endif
