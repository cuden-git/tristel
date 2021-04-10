<div class="article__btns">
  <a href="" class="btn btn--kl btn--share" title="share" data-modal-target="#share-modal"><?php echo __('share', 'tristel'); ?><i class="fas fa-share-alt"></i></a>
  <?php if($article_download): ?>
  <a href="<?php echo e($article_download['url']); ?>" class="btn btn--kl btn--pdf" target="_blank" title="Download"><i class="fas fa-file-pdf"></i>pdf <?php echo __('Download', 'tristel'); ?> - <?php echo readable_bytes($article_download['filesize']); ?></a>
  <?php endif; ?>
</div>
