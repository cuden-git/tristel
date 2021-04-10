<?php
namespace App\Controllers\Components;

trait Social {
  public function SocialLinks() {
    $fields = get_field('social_links', 'option');

    return $fields;
  }
}
