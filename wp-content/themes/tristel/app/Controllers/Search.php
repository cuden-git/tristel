<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Search extends Controller
{
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;

  public function Pagination() {
    global $wp_query;

    $output = '';

    $total_pages = $wp_query->max_num_pages;
  
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
