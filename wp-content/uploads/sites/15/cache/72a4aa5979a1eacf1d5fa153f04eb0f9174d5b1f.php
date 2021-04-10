<div class="container">
  <div class="page-intro" data-content-expand>
    <div class="page-intro__full" data-content-expand-full>
      <?php echo $page_intro['full_text']; ?><span class="page-intro__trigger" data-content-expand-trigger><?php echo __('Read less', 'tristel'); ?></span>
    </div>
    <div class="page-intro__excerpt" data-content-expand-excerpt>
      <?php echo $page_intro['excerpt']; ?> <span class="page-intro__trigger" data-content-expand-trigger><?php echo __('Read more', 'tristel'); ?></span>
    </div>
  </div>
</div>
<section class="page-section--grey">
  <div class="container news-grid">
    <div class="news-grid__bar">
      <span class="news-grid__bar-count">
        Showing of <?php echo e($grid_posts['count']); ?> Results
      </span> 
      <form>
        <label>
          <select data-jump-menu="posts_sortby">
            <option value="all">Show all articles</option>
            <option value="date_newest">Order by date - newest</option>
            <option value="date_oldest">Order by date - oldest</option>
            <option value="sort_az">Sort - A-Z</option>
            <option value="">Sort - Z-A</option>
          </select>
        </label>
      </form>
    </div>
    <div class="row news-grid__items">
      <?php $__currentLoopData = $grid_posts['posts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-4 news-grid__cell">
          <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo e($post->post_title); ?>">
            <div class="news-grid__cell-img">
              <?php echo get_the_post_thumbnail($post->ID); ?>

            </div>
            <div class="news-grid__cell-content">
              <span class="news-grid__cell-date"><?php echo get_the_date( 'j F Y' ); ?></span>
              <h6 class="news-grid__cell-title"><?php echo e($post->post_title); ?></h6>
              <span class="news-grid__cell-cta">Read more</span>       
            </div>
          </a>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <ul class="page__pagination">
      <?php $__currentLoopData = $grid_posts['pagination']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li <?php echo ($loop->index == get_query_var('paged'))? 'class="page__pagination-active"' : null; ?>><?php echo $page; ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
</section>
