<div class="container page-content">
  <div class="row">
    <aside class="products-sidebar accordion col-md-3">
      @foreach ($sidebar_options as $options)
      <div class="products-sidebar__group accordion__group">
          <h6 class="products-sidebar__title accordion__group-trigger">{{ $options['title'] }} Products</h6>
          <ul class="products-sidebar__options accordion__group-content">
            @foreach ($options['terms'] as $term)     
              <li><a href="{!! get_term_link($term->slug, 'product_cat' ) !!}?product_cat={{$term->term_id}}" title="{{ $term->name }}">{{ $term->name }}</a></li>
            @endforeach
          </ul>
      </div>
      @endforeach
    </aside>
    <div class="col-12 col-md-9">
      @php the_content() @endphp
      <div class="row brands-cat-grid">
        @foreach ($brand_cats as $cat)
          <div class="col-12 col-md-6 brands-cat-grid__cell">
            <a href="{!! get_term_link($cat['slug'], 'product_cat' ) !!}" title="{{ $cat['title'] }}">
              <div class="brands-cat-grid__img">
                <img src="{!! $cat['img_url'] !!}">
              </div>
              <h6 class="brands-cat-grid__title">{{ $cat['title'] }}</h6>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
