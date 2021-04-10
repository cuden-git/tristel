<div class="container">
  @include('partials.page-header')
  <div class="row brands-grid">
    @foreach($brands as $brand)
    <div class="col-12 brands-grid__cell @if($loop->index > 0){{ 'col-md-4' }}@else{{ 'brands-grid__cell--hero' }}@endif">
      <div class="brands-grid__img">
        <div>{!! $brand['img_tag'] !!}</div>
      </div>
      <div class="brands-grid__content">
        <img src="{!! $brand['logo']['url'] !!}" class="brands-grid__logo">
        <h6 class="brands-grid__title">{{ $brand['excerpt']['excerpt_title'] }}</h6>
        <p>{{ $brand['excerpt']['excerpt'] }}</p>
        <a href="{{ $brand['button']['url'] }}?brand_id={{ $brand['cat_id'] }}" class="btn btn--{{ $brand['button']['colour'] }}" title="{{ $brand['button']['label'] }}">{{ $brand['button']['label'] }}</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
