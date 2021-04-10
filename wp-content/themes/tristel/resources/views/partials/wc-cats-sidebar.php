<aside class="products-sidebar accordion col-md-3">
  <?php foreach ($sidebar_options as $options) { ?>
  <div class="products-sidebar__group accordion__group<?php echo ($options['active'] == 1 ? ' accordion__group--open' : null ) ?>">
      <h6 class="products-sidebar__title accordion__group-trigger" data-cat-link="<?= $options['cat_link'] ?>?brand_id=<?= $options['brand_product_category_id'] ?>"<?php echo ($options['active']? ' data-active' : null )?>><?= $options['title'] ?> <?= __('Products', 'tristel') ?></h6>
      <ul class="products-sidebar__options accordion__group-content">
      <?php foreach ($options['terms'] as $term) { ?> 
          <li><a href="<?= get_term_link($term->slug, 'product_cat' ) ?>" title="<?= $term->name ?>"><?= $term->name ?></a></li>
      <?php } ?>
      </ul>
  </div>
  <?php } ?>
</aside>
