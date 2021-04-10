<div class="site-header__lang country-choice-select" data-country-choice>
  <h6 class="country-choice-select__chosen" style="background-image: url(<?php echo e($all_sites['current']['flag_img']['url']); ?>)"><span class="country-choice-select__country"><?php echo e($all_sites['current']['country']); ?></span> - <span class="country-choice-select__lang"><?php echo e($all_sites['current']['lang']['label']); ?></span></h6>
  <ul>
      <?php $__currentLoopData = array_keys($all_sites['all']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $all_sites['all'][$key]['sites']['language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
          <li value="<?php echo e($all_sites['all'][$key]['sites']['url'][$loop->index]); ?>" style="background-image: url(<?php echo e($all_sites['all'][$key]['flag_img']['url']); ?>)">
            <a href="<?php echo e($all_sites['all'][$key]['sites']['url'][$loop->index]); ?>" 
            
            ><span class="country-choice-select__country"><?php echo e($key); ?></span> - <span class="country-choice-select__lang"><?php echo e($language['label']); ?></span></a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
