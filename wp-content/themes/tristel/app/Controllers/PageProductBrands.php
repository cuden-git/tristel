<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageProductBrands extends Controller
{
  use Partials\Flexible;
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;

  public function Brands() {
    $data = [];
    $brands = get_field('brands_posts');
    $count = 0;

    foreach($brands as $brand) {
      $data[$count]['id'] = $brand->ID;
      $data[$count]['cat_id'] = get_field('product_categories', $brand->ID);
      $data[$count]['logo'] = get_field('brand_logo', $brand->ID);
      $data[$count]['excerpt'] = get_field('brand_excerpt', $brand->ID);
      $data[$count]['img_tag'] = get_the_post_thumbnail( $brand->ID, 'large');
     // $data[$count]['product_cat_link'] = get_category_link( get_field('product_categories', $brand->ID) );
      $data[$count]['button'] = [];
      $data[$count]['button']['label'] = $data[$count]['excerpt']['button_label'];
      $data[$count]['button']['colour'] = $data[$count]['excerpt']['button_colour'];
      $data[$count]['button']['url'] = get_category_link( get_field('product_categories', $brand->ID) );//$data[$count]['excerpt']['brand_link']['url'];

      ++$count;
    }

    return $data;
  }
}
