<div class="container">
  <div class="row resources">
    <div class="col-12 col-md-8 page-maincol">
      @include('partials.page-header', ['page_headers' => App::title()])
      {!! get_the_content() !!}
      <form class="resources__search">
        <input type="text" value="" placeholder="{{ __('Enter search term','tristel') }}">
        <input type="submit" value="Search">
      </form>
      @if($resources_list['files'])
        <div id="resources-stage">
        @foreach($resources_list['files'] as $item)
          @if($loop->index == 0 || $loop->index % $resources_list['max'] == 0)
          <!-- start ul -->
          <ul class="resources__list resources__list--files{{ ($loop->index == 0)? ' resources__list--active' : null }}" data-pages>
          @endif
            <li data-search-text="{!! strtolower($item['title']) !!}">
              <a href="{!! $item['files']['url'] !!}" target="_blank" title="{{ $item['title'] }}">{{ $item['title'] }}<span class="resources__list-info">{!! $item['files']['subtype'].' '.readable_bytes($item['files']['filesize']) !!}</span><i class="fas fa-download"></i></a>
            </li>
          @if($loop->last || ($loop->index > 0 && ($loop->index+1) % $resources_list['max'] == 0))
          </ul>
          <!-- end ul -->
          @endif
        @endforeach
        </div>
      @endif
      <ul class="resources__pagination page__pagination" data-pagination>
        <li data-pagination-prev><span class="prev">&lsaquo;</span></li>
      @for ($i = 0; $i < $resources_list['num_pages']; ++$i)
        <li {{ ($i == 0 ? 'class=resources__pagination-active ' : null) }}data-pagination-page="{{ $i }}"><span>{{ $i + 1 }}</span></li>  
      @endfor
        <li data-pagination-next><span class="next">&rsaquo;</span></li>
      </ul>
    </div>
      <div class="col-12 col-md-4 page-sidebar">
        @if($sidebar_ad)
          @include('partials.content-sidebar-ad')
        @endif
    </div>
  </div>
</div>
