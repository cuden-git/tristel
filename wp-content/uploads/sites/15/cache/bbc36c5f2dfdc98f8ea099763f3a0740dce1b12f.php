<form method="get" id="searchform" class="search-form" action="<?php echo e(esc_url( home_url( '/' ) )); ?>">
    <input type="text" name="s" id="s" placeholder="<?php echo e(esc_attr_e( 'Search term' )); ?>" />
    <input type="hidden" name="search-type" value="posts" />
    <button type="submit" name="submit" class="btn-icon" value=""><i class="fas fa-caret-right"></i></button>
</form>
