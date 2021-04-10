<article <?php post_class('article') ?>>
  <section class="article__banner" style="background-image: url(<?php echo e($article_banner['url']); ?>)"></section>
  <div class="container">
    <?php echo $__env->make('partials.article.article-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php the_content() ?>
    <footer>
      <?php echo $__env->make('components.article-buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </footer>
  </div>
  <?php echo $__env->make('partials.article.share-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</article>
