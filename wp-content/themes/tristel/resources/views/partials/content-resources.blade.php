<div class="container">
  <div class="row resources">
    <div class="col-12 col-md-8 page-maincol">
      @include('partials.page-header')
      {!! get_the_content() !!}
      @if($resource_cats)
        <ul class="resources__list">
          @foreach($resource_cats as $post)
            <li>
              <a href="{!! get_permalink($post->ID) !!}" title="{{ $post->post_title }}">{{ $post->post_title }}<i class="fas fa-chevron-right"></i></a>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
    <div class="col-12 col-md-4 page-sidebar">
    @if($sidebar_ad)
      @include('partials.content-sidebar-ad')
    @endif
    </div>
  </div>
</div>