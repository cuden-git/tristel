<div class="article__btns">
  <a href="" class="btn btn--kl btn--share" title="share" data-modal-target="#share-modal">{!! __('share', 'tristel') !!}<i class="fas fa-share-alt"></i></a>
  @if($article_download)
  <a href="{{ $article_download['url'] }}" class="btn btn--kl btn--pdf" target="_blank" title="Download"><i class="fas fa-file-pdf"></i>pdf {!! __('Download', 'tristel') !!} - {!! readable_bytes($article_download['filesize']) !!}</a>
  @endif
</div>
