<?php if(!isset($_COOKIE["countryPath"]) && count($geo_site['sites']) > 1): ?>
  <?php $__env->startComponent('components.modal',['classes' => ['modal--active', 'country-choice'], 'hide_close' => true]); ?>
    <div class="country-choice__intro">
      <h2 class="country-choice__intro-title"><?php echo e($geo_site['intro']['title']); ?></h2>
      <div class="country-choice__intro-text">
        <?php echo $geo_site['intro']['intro']; ?>

      </div>
    </div>
    <ul class="country-choice__list" data-country-choice>
        <li style="background-image: url(<?php echo e($geo_site['flag']['url']); ?>)">
          <?php echo e($geo_site['country']); ?>

          <ul class="country-choice__list-lang">
          <?php $__currentLoopData = $geo_site['sites']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e($language['url']); ?>" data-country-code="<?php echo e($geo_site['country_code']); ?>" data-country-path="<?php echo e($language['url']); ?>" data-country-blog-id="<?php echo e($language['blog_id']); ?> "><?php echo e($language['lang']['label']); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </li>
    </ul>
  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
