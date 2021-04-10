<?php
namespace App\Controllers\Layouts;

trait Footer {
  public function FooterLinks() {
    $fields = get_field('footer_links', 'option');
    
    return $fields;
  }

   public function FooterLogos() {
     $fields = get_field('footer_img', 'option');

     return $fields;
   }

   public function FooterCredits() {
    $fields = get_field('footer_credits', 'option');

    return $fields;
   }
}
