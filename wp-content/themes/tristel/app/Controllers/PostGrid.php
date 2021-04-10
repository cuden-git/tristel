<?php
namespace App\Controllers;

trait PostGrid {

  public $post_type;

  public function PageIntro() {
    $data = [];

    $data['excerpt'] = wp_trim_words( get_the_content(), 40, '...' ); 
    $data['full_text'] = get_the_content();

    return $data;
  }

  public function GridPosts() {

    $data = [];

    $args = [
      'post_type' => $this->post_type,
      'paged' => get_query_var('paged'),
    ];
     switch (get_query_var('posts_sortby')) {
      case 'date_oldest':
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
        break;
      case 'date_newest':
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
        break;
      case 'sort_za':
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
        break;
      case 'sort_az':
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    }

    $posts = new \WP_Query($args);

    $data['posts'] = $posts->posts;
    $data['count'] = $posts->post_count;
    $data['pagination'] = $this->Pagination($posts->max_num_pages);

    wp_reset_postdata();

    return $data;
  }

  static function Pagination($total_pages) {
    $output = '';

    if ($total_pages > 1){
    
      $current_page = max(1, get_query_var('paged'));

      $big = 9999999;

      $output = paginate_links(array(
        'base' => str_replace( [ $big, '&#038;' ], [ '%#%', '&' ], get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => '&lsaquo;',
        'next_text' => '&rsaquo;',
        'type' => 'array'
      ));
    }

    return $output;
  }

  
}
