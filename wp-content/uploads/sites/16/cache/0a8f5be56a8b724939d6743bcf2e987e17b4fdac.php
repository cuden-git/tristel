<?php echo VISITOR_COUNTRY . ' / ' . SITE_COUNTRY . ' / ' . SITE_LANG; /*print_r($_SERVER)*/ ?>
<header class="site-header site-header--top">
    <div class="container">
      <nav class="secondary-nav">
        <?php if(has_nav_menu('secondary_navigation')): ?>
          <?php echo wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'secondary-nav__items', 'container' => false]); ?>

        <?php endif; ?>
      </nav>
      <?php echo $__env->make('partials.select-country-lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</header>
<header class="site-header site-header--bottom">
  <div class="container">
    <a class="site-header__logo" href="<?php echo e(home_url('/')); ?>" title="<?php echo e(get_bloginfo('name', 'display')); ?>"><img src="<?= App\asset_path('images/tristel-logo.svg'); ?>" alt="<?php echo e(get_bloginfo('name', 'display')); ?>"></a>
    <nav class="main-nav">
      <?php if(has_nav_menu('primary_navigation')): ?>
        <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'main-nav__items', 'container' => false, 'walker' => new Walker_Sub_Menu()]); ?>

      <?php endif; ?>
    </nav>
    <div class="site-header__btns">
      <a href="<?php echo e(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="_e('My Account')"><i class="fas fa-user"></i></a>
      <a href="<?php echo wc_get_cart_url(); ?>" class="site-header__basket" title="<?php echo e(_e('Shopping cart')); ?>"><i class="fas fa-shopping-cart"></i><span class="site-header__basket-count"><?php echo e($wc_global->cart->get_cart_contents_count()); ?></span></a>
      <i class="site-header__search fas fa-search" data-modal-target="#search-modal"></i>
      <a href="tel:" class="site-header__phone" title="<?php echo e(_e('Call now')); ?>"><i class="fas fa-phone-alt"></i></a>
      
      
      <span class="site-header__nav-btn nav-btn">
        <span></span>
        <span></span>
        <span></span>
      </span>
      <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="btn" title="Contact"><?php echo e(__('CONTACT', 'tristel')); ?></a>
    </div>
  </div>
</header>
<?php echo $__env->make('partials.content-search-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components.breadcrumbs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
