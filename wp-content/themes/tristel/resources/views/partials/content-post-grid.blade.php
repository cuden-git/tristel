<div class="container">
  <div class="page-intro" data-content-expand>
    <div class="page-intro__full" data-content-expand-full>
      {!! $page_intro['full_text'] !!}<span class="page-intro__trigger" data-content-expand-trigger>{!! __('Read less', 'tristel') !!}</span>
    </div>
    <div class="page-intro__excerpt" data-content-expand-excerpt>
      {!! $page_intro['excerpt'] !!} <span class="page-intro__trigger" data-content-expand-trigger>{!! __('Read more', 'tristel') !!}</span>
    </div>
  </div>
</div>
<section class="page-section--grey">
  <div class="container news-grid">
    <div class="news-grid__bar">
      <span class="news-grid__bar-count">
        Showing of {{$grid_posts['count']}} Results
      </span> 
      <form>
        <label>
          <select data-jump-menu="posts_sortby">
            <option value="all">Show all articles</option>
            <option value="date_newest">Order by date - newest</option>
            <option value="date_oldest">Order by date - oldest</option>
            <option value="sort_az">Sort - A-Z</option>
            <option value="">Sort - Z-A</option>
          </select>
        </label>
      </form>
    </div>
    <div class="row news-grid__items">
      @foreach($grid_posts['posts'] as $post)
        <div class="col-12 col-md-4 news-grid__cell">
          <a href="{!! get_permalink($post->ID) !!}" title="{{ $post->post_title }}">
            <div class="news-grid__cell-img">
              {!! get_the_post_thumbnail($post->ID) !!}
            </div>
            <div class="news-grid__cell-content">
              <span class="news-grid__cell-date">{!! get_the_date( 'j F Y' ) !!}</span>
              <h6 class="news-grid__cell-title">{{ $post->post_title }}</h6>
              <span class="news-grid__cell-cta">Read more</span>       
            </div>
          </a>
        </div>
      @endforeach
    </div>
    <ul class="page__pagination">
      @foreach ($grid_posts['pagination'] as $page)
        <li {!! ($loop->index == get_query_var('paged'))? 'class="page__pagination-active"' : null !!}>{!! $page !!}</li>
      @endforeach
    </ul>
  </div>
</section>
