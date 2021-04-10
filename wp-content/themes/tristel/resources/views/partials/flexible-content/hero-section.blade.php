{{-- @php dd($hero_section) @endphp --}}
<section class="hero-section" style="background-image: url({{ $hero_section['image']['url'] }})">
  <div class="container">
    <h2 class="hero-section__title">{{ $hero_section['title'] }}</h2>
    <h3 class="hero-section__subtitle">{{ $hero_section['subtitle'] }}</h3>
    <a href="{{ $hero_section['button']['url'] }}" class="btn btn--black" title="{{ $hero_section['button']['title'] }}">{{ $hero_section['button']['title'] }}</a>
  </div>
</section>
