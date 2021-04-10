<article @php post_class('article') @endphp>
  <section class="article__banner" style="background-image: url({{ $article_banner['url'] }})"></section>
  <div class="container">
    @include('partials.article.article-header')
      @php the_content() @endphp
    <footer>
      @include('components.article-buttons')
    </footer>
  </div>
  @include('partials.article.share-modal')
</article>
