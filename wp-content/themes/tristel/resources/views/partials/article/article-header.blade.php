<header class="article__header">
  <time class="page-section-title article__date" datetime="{{ get_post_time('c', true) }}">{{ get_the_date('j F Y') }}</time>
  <h1 class="page-title page-title--left">{!! get_the_title() !!}</h1>
  @include('components.article-buttons')
</header>
