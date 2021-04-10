@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-flexible-layouts')
    @include('partials.content-country-choice')
  @endwhile
@endsection
