<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateResources extends Controller
{
  use Partials\Flexible;
  use Layouts\Footer;
  use Components\Social;
  use Components\Newsletter;

  public function ResourceCats() {
    return get_field('resources_posts');
  }

  public function SidebarAd() {
    $ad_post = get_field('sidebar_banner_ad');
    $data = [];
    $data['title'] = $ad_post->post_title;
    $data['content'] = get_field('ad_content', $ad_post->ID);
    $data['cta'] = get_field('ad_cta', $ad_post->ID);

    return $data;
  }
}
