<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageBrandCategories extends Controller
{
  use Partials\Flexible;
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;

  public function BrandCats() {
    $data = [];
    $brand_id = get_query_var('brand_id');

    $args = [
      'taxonomy' =>  'product_cat',
      'hide_empty' =>  false,
      'hierarchical' =>  false,
      'meta_query' => array(
        array(
          'key' => 'brand_category',
          'value' => $brand_id
        )
      )
    ];

    $cats = get_terms( $args );
    $count = 0;

    foreach($cats as $cat) {
      $data[$count]['title'] = $cat->name;
      $data[$count]['link'] = '#';
      $data[$count]['slug'] = $cat->slug;
      $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
      //$data[$count]['img_tag'] = get_the_post_thumbnail( $thumbnail_id, 'large');
      $data[$count]['img_url'] = wp_get_attachment_url( $thumbnail_id );
      
      ++$count;
    }

    return $data;
  }

  public function SidebarOptions() {
    $data = [];
    $brands = get_posts(['post_type' => 'tristel-brands']);
    $count = 0;

    foreach($brands as $brand) {
      $data[$count] = [];
      $data[$count]['title'] = $brand->post_title;

      $args = [
        'taxonomy' =>  'product_cat',
        'hide_empty' =>  false,
        'hierarchical' =>  false,
        'meta_query' => array(
          array(
            'key' => 'brand_category',
            'value' => $brand->ID
          )
        )
      ];

      $data[$count]['terms'] = get_terms( $args );
      ++$count;
    }

    return $data;
  }
}
