@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-post-grid')
    @include('partials.content-flexible-layouts')
  @endwhile
@endsection