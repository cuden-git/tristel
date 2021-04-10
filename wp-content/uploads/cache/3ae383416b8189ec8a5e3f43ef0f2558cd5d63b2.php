<div class="container">
  <div class="row resources">
    <div class="col-12 col-md-8 page-maincol">
      <?php echo $__env->make('partials.page-header', ['page_headers' => App::title()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo get_the_content(); ?>

      <form class="resources__search">
        <input type="text" value="" placeholder="<?php echo e(__('Enter search term','tristel')); ?>">
        <input type="submit" value="Search">
      </form>
      <?php if($resources_list['files']): ?>
        <div id="resources-stage">
        <?php $__currentLoopData = $resources_list['files']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->index == 0 || $loop->index % $resources_list['max'] == 0): ?>
          <!-- start ul -->
          <ul class="resources__list resources__list--files<?php echo e(($loop->index == 0)? ' resources__list--active' : null); ?>" data-pages>
          <?php endif; ?>
            <li data-search-text="<?php echo strtolower($item['title']); ?>">
              <a href="<?php echo $item['files']['url']; ?>" target="_blank" title="<?php echo e($item['title']); ?>"><?php echo e($item['title']); ?><span class="resources__list-info"><?php echo $item['files']['subtype'].' '.readable_bytes($item['files']['filesize']); ?></span><i class="fas fa-download"></i></a>
            </li>
          <?php if($loop->last || ($loop->index > 0 && ($loop->index+1) % $resources_list['max'] == 0)): ?>
          </ul>
          <!-- end ul -->
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
      <ul class="resources__pagination page__pagination" data-pagination>
        <li data-pagination-prev><span class="prev">&lsaquo;</span></li>
      <?php for($i = 0; $i < $resources_list['num_pages']; ++$i): ?>
        <li <?php echo e(($i == 0 ? 'class=resources__pagination-active ' : null)); ?>data-pagination-page="<?php echo e($i); ?>"><span><?php echo e($i + 1); ?></span></li>  
      <?php endfor; ?>
        <li data-pagination-next><span class="next">&rsaquo;</span></li>
      </ul>
    </div>
      <div class="col-12 col-md-4 page-sidebar">
        <?php if($sidebar_ad): ?>
          <?php echo $__env->make('partials.content-sidebar-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    </div>
  </div>
</div>
