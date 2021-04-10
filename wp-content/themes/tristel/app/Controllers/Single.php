<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Single extends Controller
{
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;

  public function articleBanner()
  {
      return get_field('banner_img');
  }

  public function articleDownload()
  {
      return get_field('file_download');
  }

  public function articleSlides() {
    return get_field('single_article_carousel');
  }

  public function ResourcesList() {
    $data = [];
    $data['files'] = get_field('resources_files');

    if($data['files']) {
      $data['max'] = get_option( 'posts_per_page' );//get_field('resources_number_of_files');
      $data['num_pages'] = ceil(count($data['files']) / $data['max']);
    }

    return $data;
  }

  // private function ResourcesPagination($total, $per_page, $id, $offset) {
  //   $pages = floor((($total - 1) / $per_page) + 1);
  //   $output = '<div class="auction-lots-pagination"><ul>';
  //   $output .= ($offset > 0)? '<li class="prev"><a href="?id='.$id.'&show='.$per_page.'&offset='.($offset - $per_page).'">PREV</a></li>' : NULL;
  
  //   for($i = 0; $i < $pages; $i++) {
  //     $param_offset = ($per_page * $i);
  //     $output .= '<li>';
  //     $output .= ($param_offset != $offset)? '<a href="?id='.$id.'&show='.$per_page.'&offset='.$param_offset.'">' : NULL;
  //     $output .= ($i + 1);
  //     $output .= ($param_offset != $offset)? '</a>' : NULL;
  //     $output .= '</li>';
  //   }
  
  //   $output .= ($total - $offset <= $per_page)? NULL : '<li class="next"><a href="?id='.$id.'&show='.$per_page.'&offset='.($offset + $per_page).'">NEXT</a></li>';
  //   $output .= '</ul></div>';
  
  //   echo $output;
  // }

  public function SidebarAd() {
    $ad_post = get_field('resources_banner_ad');
    $data = [];
    $data['title'] = $ad_post->post_title;
    $data['content'] = get_field('ad_content', $ad_post->ID);
    $data['cta'] = get_field('ad_cta', $ad_post->ID);

    return $data;
  }

  public function ShareModal() {
    return get_field('modal_intro', 'option');
  }
}
