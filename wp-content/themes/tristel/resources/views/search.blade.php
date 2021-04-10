@extends('layouts.app')

@section('content')
  <div class="container">
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <div class="search__results-list">
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-search')
  @endwhile
  </div>
    <ul class="page__pagination">
      @foreach ($pagination as $page)
        <li {!! ($loop->index == get_query_var('paged'))? 'class="page__pagination-active"' : null !!}>{!! $page !!}</li>
      @endforeach
    </ul>
  </div>
@endsection