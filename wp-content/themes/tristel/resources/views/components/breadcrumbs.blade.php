@if(!is_front_page() && function_exists('yoast_breadcrumb'))
<section class="breadcrumbs">
  <div class="container">
    {!! yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ) !!}
  </div>
</section>
@endif
