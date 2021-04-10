<?php if(have_rows('layout_modules')): ?>
  <?php $module_count = 0; ?>

  <?php while(have_rows('layout_modules')): ?> <?php (the_row()) ?>

    <?php if(get_row_layout() == 'hero_slider'): ?>

     <?php echo $__env->make('partials.flexible-content.hero-carousel', ['hero_slides' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'articles_slider'): ?>

     <?php echo $__env->make('partials.flexible-content.article-carousel', ['article_slides' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'products_slider'): ?>

     <?php echo $__env->make('partials.flexible-content.product-carousel', ['product_slides' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'text_img_blocks'): ?>

     <?php echo $__env->make('partials.flexible-content.text-img-blocks', ['img_text_blocks' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'hero_section'): ?>

     <?php echo $__env->make('partials.flexible-content.hero-section', ['hero_section' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'standard_slider'): ?>

      <?php echo $__env->make('partials.flexible-content.standard-carousel', ['standard_carousel' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'location_map'): ?>

      <?php echo $__env->make('partials.flexible-content.location-map', ['location_map' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'grid_panels'): ?>

      <?php echo $__env->make('partials.flexible-content.grid-panels', ['grid_panels' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'team_carousel'): ?>

      <?php echo $__env->make('partials.flexible-content.team-carousel', ['team_carousel' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'wysiwyg_editor'): ?>

      <?php echo $__env->make('partials.flexible-content.editor-content',['editor_content' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'text_img_blocks_fw'): ?>

      <?php echo $__env->make('partials.flexible-content.text-img-blocks-fw', ['img_text_blocks_fw' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'page_headers'): ?>

      <?php echo $__env->make('partials.flexible-content.page-headers',['page_headers' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php elseif(get_row_layout() == 'team_grid'): ?>

      <?php echo $__env->make('partials.flexible-content.team-grid',['team_grid' => $page_layouts[$module_count]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php ++$module_count ?>

    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
