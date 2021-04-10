<?php 
/* Template Name: Triology */ 
?>
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-post-grid')
    @include('partials.content-flexible-layouts')
  @endwhile
@endsection
